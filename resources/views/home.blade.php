@extends('layouts.master')

@section('head')
    
    <script src="{{ asset('js/slide.js') }}"></script>
    <script src="{{ asset('js/toplist.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">

@endsection

@section('content')
    <div class="slider-relative">
        <div class="slider-block">
            <div class="slider">
                <ul class="items">
                    <li><img src="{{ config('asset.image_path.slide').'15.jpg' }}" alt=""></li>
                    <li><img src="{{ config('asset.image_path.slide').'14.jpg' }}" alt=""></li>
                    <li><img src="{{ config('asset.image_path.slide').'12.jpg' }}" alt=""></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content page1">
        <div class="container_12">
            <div class="grid_12">
                <h2>{{ trans('homepage.search') }}</h2>
                {!! Form::open([
                    'method' => 'GET', 
                    'class' => 'search-container',
                ]) !!}
                    {!! Form::text('search', '', [
                        'class' => 'search-bar', 
                        'id' => 'search-bar',
                        'placeholder' => trans('homepage.search_placeholder'),
                    ]) !!}
                    {!! Form::button('<i class="fa fa-search"></i>', [
                        'class' => 'search-icon',
                        'type' => 'submit',
                    ]) !!}
                {!! Form::close() !!}
            </div>
            <div class="grid_12 categories">
                @foreach ($categories as $catgory)
                    <a href="#" class="category">{{ $catgory->name }}</a>
                @endforeach
            </div>
            <div class="clear"></div>

            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>

            <div class="grid_12">
                <div class="car_wrap">
                    <h2>{{ trans('homepage.new') }}</h2>
                    <a href="#" class="prev new-prev"></a><a href="#" class="next new-next"></a>
                    <ul class="carousel1 new-list">
                    @foreach ($new_dishes as $new_dish)
                        <li>
                            <div>
                                <a href="{{ route('dishes.show', $new_dish->slug) }}">
                                    @if(isset($new_dish->picture))
                                        <img src="{{ config('asset.image_path.dish').$new_dish->picture }}" alt="">
                                    @else
                                        <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                    @endif
                                </a>
                                <div class="col1 upp">
                                    <a href="{{ route('dishes.show', $new_dish->slug) }}">
                                        <strong>{{ $new_dish->name }}</strong>
                                    </a>
                                    <strong class="pull-right">{{ $new_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                </div>
                                <span>{{ str_limit($new_dish->description, 100) }}</span>
                                <div>
                                    <strong>{{ $new_dish->created_at }}</strong>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="clear"></div>

            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>
            
            <div class="grid_12">
                <div class="car_wrap">
                    <h2>{{ trans('homepage.top') }}</h2>
                    <a href="#" class="prev top-prev"></a><a href="#" class="next top-next"></a>
                    <ul class="carousel1 top-list">
                    @foreach ($top_dishes as $top_dish)
                        <li>
                            <div>
                                <a href="{{ route('dishes.show', $top_dish->slug) }}">
                                    @if(isset($top_dish->picture))
                                        <img src="{{ config('asset.image_path.dish').$top_dish->picture }}" alt="">
                                    @else
                                        <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                    @endif
                                </a>
                                <div class="col1 upp">
                                    <a href="{{ route('dishes.show', $top_dish->slug) }}">
                                        <strong>{{ $top_dish->name }}</strong>
                                    </a>
                                    <strong class="pull-right">{{ $top_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                </div>
                                <span>{{ str_limit($top_dish->description, 100) }}</span>
                                <div>
                                    <strong>{{ $top_dish->created_at }}</strong>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="clear"></div>

            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>
            
            <div class="grid_12">
                <div class="car_wrap">
                    <h2>{{ trans('homepage.dish_list') }}</h2>
                    <div class="infinite-scroll">
                        <ul class="carousel1">
                        @foreach ($dishes as $home_view_dish)
                            <li>
                                <div>
                                    <a href="{{ route('dishes.show', $home_view_dish->slug) }}">
                                        @if(isset($home_view_dish->picture))
                                            <img src="{{ config('asset.image_path.dish').$home_view_dish->picture }}" alt="">
                                        @else
                                            <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                        @endif
                                    </a>
                                    <div class="col1 upp">
                                        <a href="{{ route('dishes.show', $home_view_dish->slug) }}"><strong>{{ $home_view_dish->name }}</strong></a>
                                        <strong class="pull-right">{{ $home_view_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                    </div>
                                    <span>{{ str_limit($home_view_dish->description, 100) }}</span>
                                    <div>
                                        <strong>{{ $home_view_dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div><a href="{{ route('dishes.index') }}" class="btn btn-success"><strong>{{ trans('homepage.viewmore') }}</strong></a></div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection
