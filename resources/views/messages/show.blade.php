@extends('layouts.app')

@section('content')
<div class="jumbotron">
      <h1>{{$message->title}}</h1>
      <p>{{$message->content}}</p>
      <p><a class="btn btn-success btn-lg" href="{{route('messages.create')}}" role="button">Create new Message</a>
      <a class="btn btn-primary btn-lg" href="{{route('messages.edit',['id'=>$message->id])}}" role="button">Edit Message</a>
      <form method='POST' action='{{route("messages.destroy",["id"=>$message->id])}}'>
            {{csrf_field()}}
            <input class='btn btn-danger btn-lg' type='submit' value='delete'>
            <input type='hidden' name='_method' value='DELETE' />
      </form></p>
      
</div>
@endsection