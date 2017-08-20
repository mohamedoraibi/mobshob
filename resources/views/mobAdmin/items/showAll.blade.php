@extends('layout.masterDashboard')

@section('Items')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Items
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
                <form action="/dashboard/items/search/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col-md-12">

                {{--Add New Admin Section--}}
                <h2 class="text-center">Add New Item</h2>
                <form name="usrform" method="post" action="/dashboard/items/insert" class="form-inline">
                    {{csrf_field()}}

                    <table class="table table-bordered table-hover">
                        <thead>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Item ID</th>
                        <th class="text-center">Item Number</th>
                        <th class="text-center">Item Company</th>

                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><input name="item_name" type="text" class="form-control"
                                                           id="item_name"
                                                           placeholder="enter Item Name"></td>

                            <td class="text-center"><input name="item_id" type="text" class="form-control"
                                                           id="item_id"
                                                           placeholder="enter Item ID"></td>

                            <td class="text-center"><input name="item_number" type="text" class="form-control"
                                                           id="item_number"
                                                           placeholder="enter Item Number"></td>

                            <td class="text-center">

                                <select name="item_company" id="item_company" class="form-control">
                                    @foreach($Categories as $categories)
                                        <option value="{{$categories->categories_name}}">{{$categories->categories_name}}</option>
                                    @endforeach
                                </select>
                            </td>


                        </tr>
                        </tbody>
                        <thead>
                        <th class="text-center">Item Price</th>
                        <th class="text-center">Item Summary</th>
                        <th class="text-center">Item Description</th>
                        <th class="text-center">Item Image Link</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center"><input name="item_price" type="text" class="form-control"
                                                           id="item_price"
                                                           placeholder="enter Item Price"></td>
                            <td class="text-center"><input name="item_summary" type="text" class="form-control"
                                                           id="item_summary"
                                                           placeholder="enter Item Summary"></td>

                            <td class="text-center"><input name="item_description" type="text" class="form-control"
                                                           id="item_description"
                                                           placeholder="enter Item Description"></td>

                            <td class="text-center"><input name="item_image_link" type="text" class="form-control"
                                                           id="item_image_link"
                                                           placeholder="enter Item Image Link"></td>
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
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Item ID</th>
                        <th class="text-center">Item Price</th>
                        <th class="text-center">Item Number</th>
                        <th class="text-center">Item Company</th>
                        <th class="text-center">Item Summary</th>
                        <th class="text-center">Item Description</th>
                        <th class="text-center">Item Image Link</th>
                        <th class="text-center">Edit Info.</th>
                        <th class="text-center">Delete Item</th>
                        </thead>
                        <tbody>

                        @foreach($searchResults as $searchResult)
                            <tr>
                                <td class="text-center">{{$searchResult->id}}</td>
                                <td class="text-center">{{$searchResult->item_name}}</td>
                                <td class="text-center">{{$searchResult->item_id}}</td>
                                <td class="text-center">{{$searchResult->item_price}}</td>
                                <td class="text-center">{{$searchResult->item_number}}</td>
                                <td class="text-center">{{$searchResult->item_company}}</td>
                                <td class="text-center">{{$searchResult->item_summary}}</td>
                                <td class="text-center">{{$searchResult->item_description}}</td>
                                <td class="text-center">{{$searchResult->item_image_link}}</td>
                                <td class="text-center">
                                    <modal :show="showModal" @close="showModal = false"></modal>
                                    <a href="/dashboard/items/update/{{$searchResult->id}}">Edit</a>
                                    {{--<a id="show-modal" @click="showModal = true"--}}
                                    {{--href="/dashboard/admins/update/{{$admin->id}}">Edit</a>--}}
                                </td>
                                <td class="text-center"><a
                                            href="/dashboard/items/delete/{{$searchResult->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--@endif--}}
                @endisset

                {{------------Show Admin List---------------}}
                <h2 class="text-center">Items List</h2>
                <table class="table table-bordered table-hover">
                    <thead>

                    <th class="text-center">id</th>
                    <th class="text-center">Item Name</th>
                    <th class="text-center">Item ID</th>
                    <th class="text-center">Item Price</th>
                    <th class="text-center">Item Number</th>
                    <th class="text-center">Item Company</th>
                    <th class="text-center">Item Summary</th>
                    <th class="text-center">Item Description</th>
                    <th class="text-center">Item Image Link</th>
                    <th class="text-center">Edit Info.</th>
                    <th class="text-center">Delete Item</th>
                    </thead>
                    <tbody>

                    @foreach($Item as $item)
                        <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td class="text-center">{{$item->item_name}}</td>
                            <td class="text-center">{{$item->item_id}}</td>
                            <td class="text-center">{{$item->item_price}}</td>
                            <td class="text-center">{{$item->item_number}}</td>
                            <td class="text-center">{{$item->item_company}}</td>
                            <td class="text-center">{{$item->item_summary}}</td>
                            <td class="text-center">{{$item->item_description}}</td>
                            <td class="text-center">{{$item->item_image_link}}</td>
                            <td class="text-center">
                                <modal :show="showModal" @close="showModal = false"></modal>
                                <a href="/dashboard/items/update/{{$item->id}}">Edit</a>
                                {{--<a id="show-modal" @click="showModal = true"--}}
                                {{--href="/dashboard/admins/update/{{$admin->id}}">Edit</a>--}}
                            </td>
                            <td class="text-center"><a href="/dashboard/items/delete/{{$item->id}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('adminScript')

@endsection
