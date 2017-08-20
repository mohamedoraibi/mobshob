@extends('layout.masterDashboard')

@section('Categories')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Categories
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">
            {{--Show Errors--}}
            <div class="paddingNavbar"></div>
            @if($errors->count() >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            {{--Search Section--}}
            <div class="col-md-12">
                <form action="/dashboard/categories/search/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col md-12">

                {{--Add New Admin Section--}}
                <h2 class="text-center">Add New Categories</h2>
                <form name="usrform" method="post" action="/dashboard/categories/insert" class="form-inline">
                    {{csrf_field()}}

                    <table class="table table-bordered table-hover">
                        <thead>
                        <th class="text-center">Categories Name</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><input name="categories_name" type="text" class="form-control"
                                                           id="categories_name"
                                                           placeholder="enter Categories Name"></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="col-md-4 col-md-push-8">
                        <button type="submit" style="font-size:18px;" class="btn btn-primary pull-right">Insert</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">

                {{--search result--}}
                @isset($searchResults)
                    <h2 class="text-center">Search Result</h2>
                    <table class="table table-bordered table-hover">
                        <thead>

                        <th class="text-center">id</th>
                        <th class="text-center">Categories Name</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete User</th>
                        </thead>
                        <tbody>

                        @foreach($searchResults as $searchResult)
                            <tr>
                                <td class="text-center">{{$searchResult->id}}</td>
                                <td class="text-center">{{$searchResult->categories_name}}</td>

                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/users/update/{{$searchResult->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$searchResult->id}}">Edit</a>--}}
                                </td>

                                <td class="text-center"><a
                                            href="/dashboard/categories/delete/{{$searchResult->id}}">Delete</a>
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
                        <th class="text-center">Categories Name</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                        </thead>
                        <tbody>

                        @foreach($Categories as $categories)
                            <tr>
                                <td class="text-center">{{$categories->id}}</td>
                                <td class="text-center">{{$categories->categories_name}}</td>
                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/categories/update/{{$categories->id}}">Edit</a>
                                </td>

                                <td class="text-center"><a
                                            href="/dashboard/categories/delete/{{$categories->id}}">Delete</a>
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
