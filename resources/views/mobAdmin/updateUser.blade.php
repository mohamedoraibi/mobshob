@extends('layout.masterDashboard')

@section('Users')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Edit User
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">
            <div class="paddingNavbar"></div>
            {{--show errors if validation is not ok--}}

        @if($errors->count() >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <h2 class="text-center">Edit User ({{$User->name}})</h2>

            <form name="usrform" method="POST" action="/dashboard/users/update/submit" class="form-inline">
                {{csrf_field()}}

                <table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">User Full Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">User ID</th>

                    </thead>
                    <tbody>
                    <tr>

                        <td class="text-center"><input name="name" type="text" class="form-control"
                                                       id="name"
                                                       placeholder="enter User Fullname"
                                                       value="{{$User->name}}"></td>

                        <td class="text-center"><input name="email" type="text" class="form-control"
                                                       id="email"
                                                       placeholder="enter User Email"
                                                       value="{{$User->email}}"></td>
                        <td class="text-center"><input name="user_id" type="text" class="form-control"
                                                       id="user_id"
                                                       placeholder="enter User ID"
                                                       value="{{$User->user_id}}"></td>

                        <td class="text-center"><input name="user_id_edit" type="hidden" class="form-control"
                                                       id="user_id_edit"
                                                       placeholder="" value="{{$User->id}}"></td>
                    </tr>
                    </tbody>
                </table>

                <div class="col-md-4 col-md-push-8">
                    <button type="submit" style="font-size:18px;" class="btn btn-primary pull-right">Update</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('adminScript')

@endsection
