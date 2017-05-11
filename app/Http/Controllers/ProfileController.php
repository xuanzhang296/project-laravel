<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
    	$user = Auth::user();
    	return view('profile',['user'=>$user]);
    }
    public function update(Request $request, Store $session,$id)
    {
        $this->validate($request,['name'=>'required|',
           'email'=>'required|','location'=>'request|' ,'phone'=>'request|']);
        /*
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        $session->flash('post_success','Post created successfully');
        */

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->save();
        $session->flash('update_success','Update successfully');
        return redirect()->route('profile.index');
    }
}
