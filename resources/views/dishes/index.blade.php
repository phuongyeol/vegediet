@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ url('public/css/search.css') }}">
<link rel="stylesheet" href="{{ url('public/bower_components/components-font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ url('public/css/dish_detail.css') }}">

@endsection

@section('content')
    <div class="content">
        <div class="container_12">
            <!-- Notice -->
            @if(Session::has('destroy_dish') )
                <div class="alert alert-success">
                    {{ Session::get('destroy_dish') }}
                </div>
            @endif
            <!-- Search -->
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
                @foreach ($categories as $category)
                    <a href="{{ route('cate.show', $category->slug) }}" class="category">{{ $category->name }}</a>
                @endforeach
            </div>
            <!-- List Dishes -->

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
                                    <span>{{ str_limit($home_view_dish->description,100) }}</span>
                                    <div>
                                        <strong>{{ $home_view_dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                        {{ $dishes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script src="{{ url('public/bower_components/jscroll/dist/jquery.jscroll.min.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="{{ url('public/images/loading.gif') }}" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
@endsection
