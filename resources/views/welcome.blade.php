@extends('layout.master')

@section('home')
    active
@endsection

@section('title')
    MobShob
@endsection

@section('content')

    <div class="container">
        <div class="row">
            {{--Search Section--}}

            <div class="col-md-4 col-md-2-pull-left pull-right">
                <form action="/search/" method="GET" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="container">
                <div class="row">

                    <div class="text-left col-md-6">
                        <a href="/filter/AtoZ" class="btn btn-default">Sort A-Z</a>
                        <a href="/filter/ZtoA" class="btn btn-default">Sort Z-A</a>
                        <a href="/filter/bigPrice" class="btn btn-default">Sort Big Price First</a>
                        <a href="/filter/lowPrice" class="btn btn-default">Sort Low Price First</a>
                    </div>

                </div>
            </div>
            {{--Seach Result--}}
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
                                    <p>${{$searchResult->item_price}}</p>
                                    <p>{{$searchResult->item_summary}}</p>
                                    <p>
                                        {{--Check user log in or not--}}
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
            {{-- New Mobiles section --}}
            <div class="col-md-12">

                <h3 class="alert alert-success">New Mobiles</h3>

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
                                    @if(Auth::check())
                                        <a class=" alert-info">
                                            <a href="#" class="btn btn-danger" role="button">Add to Cart</a>
                                        </a>
                                    @endif
                                    <a style="margin-right: 10px;"></a>
                                    <a href="/description/{{$item->id}}" class="btn btn-default" role="button">Read
                                        More</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--Paginate--}}
                <div class="col-md-12 text-center">
                    <?php echo $Item->render(); ?>
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
