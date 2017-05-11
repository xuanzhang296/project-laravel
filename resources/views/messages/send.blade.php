@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if($errors && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('message_success'))
                <div class="alert alert-success">
                    {{Session::get('message_success')}}
                </div>
            @endif
            <form action="{{route('messages.sendto')}}" method="post">
                
                {{csrf_field()}}
                <label for="title">To</label>
                <input type="text" name="to" class="form-control" value = '{{$message->to}}'/>
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value = '{{$message->title}}'/>
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{$message->content}}</textarea><br />
                <input type="submit" value="Sendto" class="btn btn-success"/>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection