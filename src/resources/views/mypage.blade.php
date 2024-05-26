@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <!-- {{var_dump($book_item)}} -->
    <div class="contents">
        <div class="books">
            @foreach ($book_item as $books)
                <div class="books_detail">
                    <p class="books_detail-name">{{$books->shop->name}}</p>
                    <p class="books_detail-date">{{$books['date']}}</p>
                    <p class="books_detail-time">{{$books['time']}}</p>
                    <p class="books_detail-number">{{$books['number']}}人</p>
                    <form class="restaurant_details" action="/modify" method="POST">
                    @csrf
                        <input type="hidden" name="book_details" id="book_details" value="{{json_encode($books)}}">
                        <button class="book_info">編集</button>
                    </form>
                </div>
            @endforeach
        </div>


        <div class="likes">
            <p>{{$user_name}}さん</p>

            @foreach ($like_item as $likes)
                <div class="restaurant">
                    <!-- <img class="restaurant_pic" src="{{ asset($likes->shop->picture) }}" alt="写真"> -->
                    <p class="restaurant_name">{{$likes->shop->name}}</p>
                    <p class="restaurant_area">#{{$likes->shop->area->area}}</p>
                    <p class="restaurant_genre">#{{$likes->shop->genre->genre}}</p>
                    <form class="restaurant_details" action="/details" method="POST">
                    @csrf
                        <input type="hidden" name="restaurant_details" id="restaurant_details" value="{{json_encode($likes['shop'])}}">
                        <button class="restaurant_info">詳しく見る</button>
                    </form>
                    <form class="restaurant_details" action="/mypage/dislikes" method="POST">
                    @method('DELETE')
                    @csrf
                        <input type="hidden" name="shop_delete" id="shop_delete" value="{{json_encode($likes)}}">
                        <button class="restaurant_like">お気に入りを外す</button>
                    </form>
                </div>
            @endforeach



        </div>
    

    </div>
@endsection
