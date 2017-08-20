@extends('layout.masterDashboard')

@section('Admins')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Reset Password
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">
            <div class="paddingNavbar"></div>
            <h2 class="text-center">Are you sure you want to Reset Password to -> Admin ({{$Admin->admin_fullname}}
                )</h2>
            <td class="text-center"><input name="admin_id_edit" type="hidden" class="form-control"
                                           id="admin_id_edit"
                                           placeholder="enter Admin Fullname" value="{{$Admin->id}}"></td>
            <div class="col-md-12 text-center">
                <a class="btn " style="margin-right: 35px" href="/dashboard/admins/resetPassword/submit/{{$Admin->id}}">Yes</a>

                <button class="btn " href="/dashboard/admins/resetPassword/submit/{{$Admin->id}}">No</button>
            </div>
        </div>
    </div>
@endsection

@section('adminScript')

@endsection
