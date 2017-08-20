@extends('layout.masterDashboard')

@section('Admins')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Edit
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
            <h2 class="text-center">Edit Adminstrator ({{$Admin->admin_fullname}})</h2>

            <form name="usrform" method="post" action="/dashboard/admins/update/submit" class="form-inline">
                {{csrf_field()}}

                <table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">Admin Name</th>
                    <th class="text-center">Username</th>

                    </thead>
                    <tbody>
                    <tr>

                        <td class="text-center"><input name="admin_fullname" type="text" class="form-control"
                                                       id="admin_fullname"
                                                       placeholder="enter Admin Fullname"
                                                       value="{{$Admin->admin_fullname}}"></td>

                        <td class="text-center"><input name="admin_username" type="text" class="form-control"
                                                       id="admin_username"
                                                       placeholder="enter Admin Username"
                                                       value="{{$Admin->admin_username}}"></td>

                        <td class="text-center"><input name="admin_id_edit" type="hidden" class="form-control"
                                                       id="admin_id_edit"
                                                       placeholder="enter Admin Fullname" value="{{$Admin->id}}"></td>
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
