@extends('layout.master')

@section('samsung')
    active
@endsection

@section('title')
    MobShob samsung
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="alert alert-success">Samsung Mobiles</h3>
            @foreach($Item as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$item->item_image_link}}"
                             alt="...">
                        <div class="caption">
                            <h3>{{$item->item_name}}</h3>
                            <p>{{$item->item_summary}}</p>
                            <p>
                                <a href="#" class="btn btn-danger" role="button">Add to Cart</a>
                                <a style="margin-right: 10px;"></a>
                                <a href="/description/{{$item->id}}" class="btn btn-default" role="button">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection