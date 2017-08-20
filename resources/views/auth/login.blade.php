@extends('layout.master')

@section('login')
    active
@endsection

@section('title')
    Login
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <form method="post" action="{{Route('auth.login',['_token'=>csrf_token()])}}">
                <br><br><br>
                 {{--show errors if validation is not ok--}}
                @if($errors->count()>0)
                    <div class="aler alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                {{--check if user is login will show his user name and email--}}
                @if(Auth::check())
                    <div class="alert alert-info">
                        Name: {{Auth::user()->name}}
                        <br>
                        Email: {{Auth::user()->email}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                           id="exampleInputEmail1"
                           placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember_me" value="true"> Remember my Password
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection