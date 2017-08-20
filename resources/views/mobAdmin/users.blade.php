@extends('layout.masterDashboard')

@section('Users')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Users
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">

            <div class="paddingNavbar"></div>
            {{--Show Errors--}}
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
                <form action="/dashboard/users/search/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col md-12">

                {{--Add New Admin Section--}}
                <h2 class="text-center">Add New User</h2>
                <form name="usrform" method="post" action="/dashboard/users/insert" class="form-inline">
                    {{csrf_field()}}

                    <table class="table table-bordered table-hover">
                        <thead>
                        <th class="text-center">User Full Name</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Repeat Password</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><input name="name" type="text" class="form-control"
                                                           id="name"
                                                           placeholder="enter User Fullname"></td>

                            <td class="text-center"><input name="user_id" type="text" class="form-control"
                                                           id="user_id"
                                                           placeholder="enter User ID"></td>
                            <td class="text-center"><input name="email" type="email" class="form-control"
                                                           id="email"
                                                           placeholder="enter User Email"></td>

                            <td class="text-center"><input type="password" name="user_password" class="form-control"
                                                           id="admin_password"
                                                           placeholder="Min 6 char.">
                            </td>
                            <td class="text-center"><input type="password" name="user_password_repeat"
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

                {{--@if(!$searchResults==null)--}}
                @isset($searchResults)
                    <h2 class="text-center">Search Result</h2>
                    <table class="table table-bordered table-hover">
                        <thead>

                        <th class="text-center">id</th>
                        <th class="text-center">User Full Name</th>
                        <th class="text-center">User Email</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Reset Password</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete User</th>
                        </thead>
                        <tbody>

                        @foreach($searchResults as $searchResult)
                            <tr>
                                <td class="text-center">{{$searchResult->id}}</td>
                                <td class="text-center">{{$searchResult->name}}</td>
                                <td class="text-center">{{$searchResult->email}}</td>
                                <td class="text-center">{{$searchResult->user_id}}</td>
                                <td class="text-center"><a href="/dashboard/admins/resetPassword/{{$searchResult->id}}">Reset</a>
                                </td>

                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/users/update/{{$searchResult->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$searchResult->id}}">Edit</a>--}}
                                </td>

                                <td class="text-center"><a
                                            href="/dashboard/users/delete/{{$searchResult->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--@endif--}}
                @endisset

                {{------------Show Admin List---------------}}
                <h2 class="text-center">Users List</h2>
                <div id="root">
                    <table class="table table-bordered table-hover">
                        <thead>

                        <th class="text-center">id</th>
                        <th class="text-center">User Full Name</th>
                        <th class="text-center">User Email</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Reset Password</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete User</th>
                        </thead>
                        <tbody>

                        @foreach($User as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->user_id}}</td>
                                <td class="text-center"><a
                                            href="/dashboard/admins/resetPassword/{{$user->id}}">Reset</a>
                                </td>

                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/users/update/{{$user->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$user->id}}">Edit</a>--}}
                                </td>

                                <td class="text-center"><a
                                            href="/dashboard/users/delete/{{$user->id}}">Delete</a>
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
    <script>
    var vm = new Vue({
    el: "#root",
    data: {
    showModal: false
    },
    })
    Vue.component('modal', {
    template: '#modal-template',
    props: ['show'],
    methods: {
    savePost: function () {
    // Some save logic goes here...

    this.$emit('close');
    },
    close: function () {
    this.$emit('close');
    }
    }
    });
    </script>

@endsection
