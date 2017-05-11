@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div >
            @if($errors && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('update_success'))
                <div class="alert alert-success">
                    {{Session::get('update_success')}}
                </div>
            @endif
            <form action="{{route('profile.update',['id'=>$user->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="abc" />--}}
            {{csrf_field()}}

                    <div>
                      <label >Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" value = "{{$user->name}}">
                    </div>

                    <div>
                      <label >Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter Email" value="{{$user->email}}"  />
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div>
                      <label >location</label>
                      <input type="text" class="form-control" id="location" placeholder="Enter Location" value = "{{$user->location}}" />
                    </div>

                    <div>
                      <label >phone</label>
                      <input type="text" class="form-control" id="phone" placeholder="Enter Phone Num" value="{{$user->phone}}" /> 
                    </div>

                    <br/>

                    <input type="submit" value="Update" class="btn btn-success" />


                    <input type="hidden" value="PUT" name = '_method' />
            </form>

            </div>
        </div>
    </div>
</div>
@endsection
