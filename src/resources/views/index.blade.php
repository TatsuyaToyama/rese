@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <div class="contents">
    <!-- 持ってきた値をloopし、全部以下のフォーマットで表示させる -->
    @foreach ($restaurants_all as $restaurant)
        <div class="restaurant">
            <!-- <img class="restaurant_pic" src="{{ asset($restaurant['picture']) }}" alt="写真"> -->
            <p class="restaurant_name">{{$restaurant['name']}}</p>
            <p class="restaurant_area">#{{$restaurant->area->area}}</p>
            <p class="restaurant_genre">#{{$restaurant->genre->genre}}</p>
            <form class="restaurant_details" action="/details" method="POST">
            @csrf
                <input type="hidden" name="restaurant_details" id="restaurant_details" value="{{json_encode($restaurant)}}">
                <button class="restaurant_info">詳しく見る</button>
            </form>

                @if($restaurant->likes->contains('user_id', $user_id))
                    <form class="restaurant_details" action="/dislike" method="POST">
                    @method('DELETE')
                    @csrf
                        <input type="hidden" name="shop_delete" id="shop_delete" value="{{json_encode($restaurant)}}">
                        <button class="restaurant_like">お気に入りを外す</button>
                    </form>
                @else
                    <form class="restaurant_details" action="/like" method="POST">
                    @csrf
                        <input type="hidden" name="shop_like" id="shop_like" value="{{json_encode($restaurant)}}">
                        <button class="restaurant_like">お気に入りに登録</button>
                    </form>
                @endif

        </div>
    @endforeach

    </div>
@endsection
