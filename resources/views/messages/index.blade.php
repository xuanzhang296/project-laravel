@extends('layouts.app')
@section('content')

<div class="jumbotron">
  
  <p><a class="btn btn-primary btn-lg" href="{{route('messages.create')}}" role="button">Create new Message</a></p>
</div>

@if(Session::has('message_success'))
                <div class="alert alert-success">
                    {{Session::get('message_success')}}
                </div>
@endif

<div class ="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
   @foreach($messages as $message)
    <div class="panel panel-default">
  <div class="panel-heading">{{$message->title}}</div>
  <div class="panel-body">
    {{$message->content}}
    <p>Create @ : {{ date('M D Y',strtotime($message->created_at))}},
       Edit   @ : {{ date('M D Y',strtotime($message->updated_at))}}
    </p><br />

    <div>
      <a class="btn btn-success btn-sm" href="{{route('messages.show',['id'=>$message->id])}}">View Message</a>
      <a class="btn btn-primary btn-sm" href="{{route('messages.edit',['id'=>$message->id])}}">Edit Message</a>
      <a class="btn btn-danger btn-sm" href="{{route('messages.send',['id'=>$message->id])}}">send Message</a>

      @if($message->important !== 0)
      <h3><span class="label label-default">Important!!!</span></h3>
      @endif
    </div>
  </div>
</div>
    @endforeach
    {{$messages->links()}}
   </div>
  <div class="col-md-1"></div>
</div>


@endsection