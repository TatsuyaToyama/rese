@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <div class="user_title-inner">
        <h1 class="user_title">{{$user_name}}さん</h1>
    </div>
    <div class="contents">
        <div class="books">
            <div class="books_title-inner">
                <h2 class="books_title">予約状況</h2>
            </div>
            <div class="books_title-inner">
                <h3 class="books_title">今後の予約</h3>
            </div>
        @foreach ($book_item as $books)
            @if($books['visited']==0)
                <div class="books_detail_future">
                    <div class="books_details-title">
                        <img class="icon" src="{{ asset('storage/icon/clock.svg') }}" alt="写真">
                        <p>予約{{ $loop->iteration }}</p>
                    </div>
                    <table class="books_table">
                            <tr class="books_row">
                                <td  class="books_elements">Shop</td>
                                <td class="books_elements">{{$books->shop->name}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Date</td>
                                <td class="books_elements">{{$books['date']}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Time</td>
                                <td class="books_elements">{{$books['time']}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Number</td>
                                <td class="books_elements">{{$books['number']}}人</td>
                            </tr>
                    </table>
                    <form class="restaurant_details" action="/modify" method="POST">
                    @csrf
                        <input type="hidden" name="book_details" id="book_details" value="{{json_encode($books)}}">
                        <button class="send">編集</button>
                    </form>
                </div>
            @endif
        @endforeach
        <div class="books_title-inner">
            <h3 class="books_title">過去の予約</h3>
        </div>
        @foreach ($book_item as $books)
            @if($books['visited']==1)
                <div class="books_detail">
                    <div class="books_details-title">
                        <img class="icon" src="{{ asset('storage/icon/clock.svg') }}" alt="写真">
                        <p>予約{{ $loop->iteration }}</p>
                    </div>
                    <form class="restaurant_review" action="/mypage/review" method="POST">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$books->shop->id}}">

                     <table class="books_table">
                            <tr class="books_row">
                                <td  class="books_elements">Shop</td>
                                <td class="books_elements">{{$books->shop->name}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Date</td>
                                <td class="books_elements">{{$books['date']}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Time</td>
                                <td class="books_elements">{{$books['time']}}</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Number</td>
                                <td class="books_elements">{{$books['number']}}人</td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Point</td>
                                <td class="books_elements">
                                <select  class="shop_review" name="point" id="point">
                                <option value="1">1.0</option>
                                <option value="2">2.0</option>
                                <option value="3">3.0</option>
                                <option value="4">4.0</option>
                                <option value="5">5.0</option>
                            </select>
                                </td>
                            </tr>
                            <tr class="books_row">
                                <td class="books_elements">Review</td>
                                <td class="books_elements">
                                    <input type="textarea" name="comment" id="booking_review-comment">
                                </td>
                            </tr>
                    </table>
                        <div class="button">
                            <button class="send">評価を送信</button>
                        </div>
                        </form>
                    </div>
            @endif
        @endforeach
            
        </div>


        <div class="likes">
            <div class="likes_title-inner">
                <h2 class="likes_title">お気に入り店舗</h2>
            </div>
            <div class="restaurant-inner">
            @foreach ($like_item as $likes)
                <div class="restaurant">
                    <img class="restaurant_pic" src="{{ asset($likes->shop->picture) }}" alt="写真">
                    <div class="restaurant_contents">
                        <p class="restaurant_name">{{$likes->shop->name}}</p>
                        <div class="restaurant_tag">
                            <p class="restaurant_area">#{{$likes->shop->area->area}}</p>
                            <p class="restaurant_genre">#{{$likes->shop->genre->genre}}</p>
                        </div> 
                        <div class="restaurant_submit">
                            <form class="restaurant_details" action="/details" method="POST">
                            @csrf
                                <input type="hidden" name="restaurant_details" id="restaurant_details" value="{{json_encode($likes['shop'])}}">
                                <button class="restaurant_info">詳しく見る</button>
                            </form>
                            <form class="restaurant_submit-likes" action="/mypage/dislikes" method="POST">
                            @method('DELETE')
                            @csrf
                                <input type="hidden" name="shop_delete" id="shop_delete" value="{{json_encode($likes)}}">
                                <button class="restaurant_like">❤︎</button>
                            </form>
                        </div> 
                    </div> 
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
