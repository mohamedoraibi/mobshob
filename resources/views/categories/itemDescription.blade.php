@extends('layout.master')

@section('Item')
    active
@endsection

@section('titleDashboard')
    MobShob {{$Item->item_name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="thumbnail">
                    <img src="{{$Item->item_image_link}}"
                         alt="...">
                    <div class="caption">
                        <h3>{{$Item->item_name}}</h3>
                        <p>{{$Item->item_summary}}</p>
                        <p>
                            <a href="#" class="btn btn-danger " role="button">Add to Cart</a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <p>
                    {{$Item->item_description}}
                </p>
            </div>
        </div>
    </div>

@endsection

@section('adminScript')

@endsection
