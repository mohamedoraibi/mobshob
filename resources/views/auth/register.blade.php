@extends('layout.master')

@section('register')
    active
@endsection

@section('title')
    Register
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method="post" action="{{Route('auth.register',['_token'=>csrf_token()])}}">
            {{--<form method="post" action="#">--}}

                <br><br><br>
                {{--show errors if validation is not ok--}}
                @if($errors->count()>0)
                    <div class="aler alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail12">Username</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control"
                           placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                           id="exampleInputEmail1"
                           placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="re_password" class="form-control" id="exampleInputPassword1"
                           placeholder="Confirm Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember my Password
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection