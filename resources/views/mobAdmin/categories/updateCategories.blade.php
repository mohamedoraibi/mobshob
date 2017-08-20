@extends('layout.masterDashboard')

@section('Categories')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Edit Category
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
            <h2 class="text-center">Edit Item ({{$Categories->categories_name}})</h2>

            <form name="usrform" method="POST" action="/dashboard/categories/update/submit" class="form-inline">
                {{csrf_field()}}

                <table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">Categories Name</th>
                    </thead>
                    <tbody>
                    <tr>
                    <tr>
                        <td class="text-center"><input name="categories_name" type="text" class="form-control"
                                                       id="categories_name"
                                                       value="{{$Categories->categories_name}}"
                                                       placeholder="enter Categories Name"></td>
                    </tr>
                    <td class="text-center"><input name="categories_id_edit" type="hidden" class="form-control"
                                                   id="categories_id_edit"
                                                   placeholder="" value="{{$Categories->id}}"></td>
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
