@extends('layout.masterDashboard')

@section('Items')
    sidebarActive
@endsection

@section('titleDashboard')
    MobShob Edit Item
@endsection

@section('contentDashboard')
    <div class="container">
        <div class="row">
            <div class="paddingNavbar"></div>
            @if($errors->count() >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <h2 class="text-center">Edit Item ({{$Item->name}})</h2>

            <form name="usrform" method="POST" action="/dashboard/items/update/submit" class="form-inline">
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
                                                       value="{{$Item->item_name}}"
                                                       placeholder="enter Item Name"></td>

                        <td class="text-center"><input name="item_id" type="text" class="form-control"
                                                       id="item_id"
                                                       value="{{$Item->item_id}}"
                                                       placeholder="enter Item ID"></td>

                        <td class="text-center"><input name="item_number" type="text" class="form-control"
                                                       id="item_number"
                                                       value="{{$Item->item_number}}"
                                                       placeholder="enter Item Number"></td>

                        <td class="text-center"><input name="item_company" type="text" class="form-control"
                                                       id="item_company"
                                                       value="{{$Item->item_company}}"
                                                       placeholder="enter Item Company"></td>


                    </tr>
                    </tbody>
                    <thead>
                    <th class="text-center">Item Summary</th>
                    <th class="text-center">Item Description</th>
                    <th class="text-center">Item Image Link</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><input name="item_summary" type="text" class="form-control"
                                                       id="item_summary"
                                                       value="{{$Item->item_summary}}"
                                                       placeholder="enter Item Summary"></td>

                        <td class="text-center"><input name="item_description" type="text" class="form-control"
                                                       id="item_description"
                                                       value="{{$Item->item_description}}"
                                                       placeholder="enter Item Description"></td>

                        <td class="text-center"><input name="item_image_link" type="text" class="form-control"
                                                       id="item_image_link"
                                                       value="{{$Item->item_image_link}}"
                                                       placeholder="enter Item Image Link"></td>
                        <td class="text-center"><input name="item_id_edit" type="hidden" class="form-control"
                                                       id="item_id_edit"
                                                       placeholder="" value="{{$Item->id}}"></td>
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
