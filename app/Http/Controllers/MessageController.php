<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Store;
use Auth;
use App\Message;
use App\User;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = Auth::user();
        $user_id = $user->id;
        $messages = Message::where('user_id',$user_id)->paginate(5);
        

        return view('messages.index',['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $session)
    {
        
        $this->validate($request,['title'=>'required|min:5',
           'content'=>'required|min:10' ]);
       $user = Auth::user();
       $message = new Message();
       $message->from = $user->email;
       $message->to = $request->to;
       $message->title = $request->title;
       $message->content= $request->content;
       
       $message->user_id = $user->id;
       $message->save();
       $session->flash('message_success','Message created successfully');
       return redirect()->route('messages.show',['id'=>$message->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);


        /*
        echo '<pre>';
        print_r($post);
        exit;
        */
        return view('messages.show',['message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        return view('messages.edit',['message'=>$message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $session, $id)
    {
         $this->validate($request,['title'=>'required|min:5',
           'content'=>'required|min:10' ]);

       $message = Message::find($id);
       $message->title = $request->title;
       $message->content = $request->content;
       $message->important = $request->important;
       $user = Auth::user();
       $message->user_id = $user->id;
       $message->save();
       $session->flash('message_success','Message created successfully');
       return redirect()->route('messages.show',['id'=>$message->id]);
    }

    public function send($id)
    {
        $users = DB::table('users')->select('email')->distinct()->get();
        $message = Message::find($id);
        return view('messages.send',['message'=>$message,'users'=>$users]);
    }

    public function sendto(Request $request, Store $session){

        $this->validate($request,['title'=>'required|min:5',
           'content'=>'required|min:10' ]);
       $user = Auth::user();
       $message = new Message();
       $message->from = $user->email;
       $message->to = $request->to;
       $message->title = $request->title;
       $message->content= $request->content;
       /*
       $posts = Post::where('id',3)->select('title','description')->offset(2)->orderBy('id','desc')->limit(3)->get()->toArray();
       */
       $to = $request->to;
       $u_id = User::where('email',$to)->select('id')->get();
       $message->user_id = $u_id[0]->id;
       $message->save();
       $session->flash('message_success','Message created successfully');
       return redirect()->route('messages.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Store $session)
    {
        $message = Message::find($id);
        $message->delete();
        $session->flash('message_success','Message deleted successfully');   
        return redirect()->route('messages.index');
    }
}
