@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
{{var_dump($restaurants_all)}}
    <div class="contents">
    <!-- 持ってきた値をloopし、全部以下のフォーマットで表示させる -->
    @foreach ($restaurants_all as $restaurant)
        <div class="restaurant">
            <img class="restaurant_pic" src="{{ asset($restaurant['picture']) }}" alt="写真">
            <p class="restaurant_name">{{$restaurant['name']}}</p>
            <p class="restaurant_area">#{{$restaurant['area']}}</p>
            <p class="restaurant_genre">#{{$restaurant['genre']}}</p>
            <form class="restaurant_details" action="/details">
                <input type="hidden" name="restaurant_info" id="restaurant_info" value="{{$restaurant}}">
                <button class="restaurant_info">詳しく見る</button>
            </form>
        </div>
    @endforeach

    </div>
@endsection
