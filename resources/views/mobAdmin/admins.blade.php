@extends('layout.masterDashboard')

@section('Admins')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Admins
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">
            {{--Show Errors--}}
            <div class="paddingNavbar"></div>
            {{--show errors if validation is not ok--}}

        @if($errors->count() >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            {{--Search Section--}}
            <div class="col-md-12">
                <form action="/dashboard/admins/search/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col md-12">

                {{--Add New Admin Section--}}
                <h2 class="text-center">Add New Administrator</h2>
                <form name="usrform" method="post" action="/dashboard/admins/insert" class="form-inline">
                    {{csrf_field()}}

                    <table class="table table-bordered table-hover">
                        <thead>
                        <th class="text-center">Administrator Name</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Repeat Password</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><input name="admin_fullname" type="text" class="form-control"
                                                           id="admin_fullname"
                                                           placeholder="enter Admin Fullname"></td>

                            <td class="text-center"><input name="admin_username" type="text" class="form-control"
                                                           id="admin_username"
                                                           placeholder="enter Admin Username"></td>

                            <td class="text-center"><input type="password" name="admin_password" class="form-control"
                                                           id="admin_password"
                                                           placeholder="Min 6 char.">
                            </td>
                            <td class="text-center"><input type="password" name="admin_password_repeat"
                                                           class="form-control"
                                                           id="admin_password_repeat"
                                                           placeholder="Repeat Password">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="col-md-4 col-md-push-8">
                        <button type="submit" style="font-size:18px;" class="btn btn-primary pull-right">Insert</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">

                {{--Search Result Section --}}
                @isset($searchResults)
                    <h2 class="text-center">Search Result</h2>
                    <table class="table table-bordered table-hover">
                        <thead>

                        <th class="text-center">id</th>
                        <th class="text-center">Administrator Name</th>
                        <th class="text-center">Administrator Username</th>
                        <th class="text-center">Reset Password</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete Administrator</th>
                        </thead>
                        <tbody>

                        @foreach($searchResults as $searchResult)
                            <tr>
                                <td class="text-center">{{$searchResult->id}}</td>
                                <td class="text-center">{{$searchResult->admin_fullname}}</td>
                                <td class="text-center">{{$searchResult->admin_username}}</td>
                                <td class="text-center"><a href="/dashboard/admins/resetPassword/{{$searchResult->id}}">Reset</a>
                                </td>

                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/admins/update/{{$searchResult->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$admin->id}}">Edit</a>--}}
                                </td>

                                <td class="text-center"><a
                                            href="/dashboard/admins/delete/{{$searchResult->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--@endif--}}
                @endisset

                {{------------Show Admin List---------------}}
                <h2 class="text-center">Administrators List</h2>
                <div id="root">
                    <table class="table table-bordered table-hover">
                        <thead>

                        <th class="text-center">id</th>
                        <th class="text-center">Administrator Name</th>
                        <th class="text-center">Administrator Username</th>
                        <th class="text-center">Reset Password</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete Administrator</th>
                        </thead>
                        <tbody>

                        @foreach($Admin as $admin)
                            <tr>
                                <td class="text-center">{{$admin->id}}</td>
                                <td class="text-center">{{$admin->admin_fullname}}</td>
                                <td class="text-center">{{$admin->admin_username}}</td>
                                <td class="text-center"><a
                                            href="/dashboard/admins/resetPassword/{{$admin->id}}">Reset</a>
                                </td>

                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/admins/update/{{$admin->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$admin->id}}">Edit</a>--}}
                                </td>

                                <td class="text-center"><a href="/dashboard/admins/delete/{{$admin->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('adminScript')
    {{--<script>--}}
    {{--var vm = new Vue({--}}
    {{--el: "#root",--}}
    {{--data: {--}}
    {{--showModal: false--}}
    {{--},--}}
    {{--})--}}
    {{--Vue.component('modal', {--}}
    {{--template: '#modal-template',--}}
    {{--props: ['show'],--}}
    {{--methods: {--}}
    {{--savePost: function () {--}}
    {{--// Some save logic goes here...--}}

    {{--this.$emit('close');--}}
    {{--},--}}
    {{--close: function () {--}}
    {{--this.$emit('close');--}}
    {{--}--}}
    {{--}--}}
    {{--});--}}
    {{--</script>--}}

@endsection
