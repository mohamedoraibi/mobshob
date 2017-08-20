@extends('layout.master')

@section('iphone')
    active
@endsection

@section('title')
    MobShob Iphone
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{--Search Section--}}
            <div class="col-md-4 col-md-8-pull-left pull-right">
                <form action="/search/iphone/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            {{--Seach Result--}}
            {{--if user make seach will show the result --}}
            @isset($searchResults)
                <div class="col-md-12">
                    <h3 class="alert alert-success">Search Result</h3>
                    {{--Get search Results--}}
                    @foreach($searchResults as $searchResult)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{$searchResult->item_image_link}}"
                                     alt="...">
                                <div class="caption">
                                    <h3>{{$searchResult->item_name}}</h3>
                                    <p>${{$item->item_price}}</p>
                                    <p>{{$searchResult->item_summary}}</p>
                                    <p>
                                        {{--Check user log in or not--}}
                                        {{--check if user login will show add to cart button --}}
                                        @if(Auth::check())
                                            <a class=" alert-info">
                                                <a href="#" class="btn btn-danger" role="button">Add to Cart</a>
                                            </a>
                                        @endif
                                        <a style="margin-right: 10px;"></a>
                                        <a href="/description/{{$searchResult->id}}" class="btn btn-default"
                                           role="button">Read
                                            More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endisset
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h3 class="alert alert-success">Iphone Mobiles</h3>
            {{--show iphone items--}}
            @foreach($Item as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$item->item_image_link}}"
                             alt="...">
                        <div class="caption">
                            <h3>{{$item->item_name}}</h3>
                            <p>${{$item->item_price}}</p>
                            <p>{{$item->item_summary}}</p>
                            <p>
                                {{--check if user login will show add to cart button --}}
                                @if(Auth::check())
                                    <a class=" alert-info">
                                        <a href="#" class="btn btn-danger" role="button">Add to Cart</a>
                                    </a>
                                @endif
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