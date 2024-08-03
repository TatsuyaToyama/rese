@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
    <div class="search">
        <form class="shop_search" id="booking_form" action="/search" method="GET">
            @csrf
            <select class="search_area" name="area" id="booking_area_input">
                <option value="0" {{ request('area') == '0' ? 'selected' : '' }}>All area</option>
                @foreach ($area_all as $area)
                    <option value="{{ $area->id }}" {{ request('area') == $area->id ? 'selected' : '' }}>{{ $area->area }}</option>
                @endforeach
            </select>
            <select class="search_genre" name="genre" id="booking_genre_input">
                <option value="0" {{ request('genre') == '0' ? 'selected' : '' }}>All genre</option>
                @foreach ($genre_all as $genre)
                    <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>{{ $genre->genre }}</option>
                @endforeach
            </select>
            <img class="icon" src="{{ asset('storage/icon/glass.svg') }}" alt="写真">
            <input class="search_word" type="text" name="search_word" id="search_word_input" value="{{ request('search_word') }}" placeholder="search....">
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const areaSelect = document.getElementById('booking_area_input');
        const genreSelect = document.getElementById('booking_genre_input');
        const searchForm = document.getElementById('booking_form');

        areaSelect.addEventListener('change', function() {
            searchForm.submit();
        });

        genreSelect.addEventListener('change', function() {
            searchForm.submit();
        });
        document.getElementById('search_word_input').addEventListener('input', function() {
                clearTimeout(this.delay);
                this.delay = setTimeout(function() {
                    form.submit();
                }.bind(this), 500);
    });
    });
    </script>
@endsection

@section('content')
    <div class="contents">
    <!-- 持ってきた値をloopし、全部以下のフォーマットで表示させる -->
    
    @foreach ($restaurants_all as $restaurant)
        <div class="restaurant">
            <img class="restaurant_pic" src="{{ asset($restaurant['picture']) }}" alt="写真">
            <div class="restaurant_contents">
                <p class="restaurant_name">{{$restaurant['name']}}</p>
                <div class="restaurant_tag">
                    <p class="restaurant_area">#{{$restaurant->area->area}}</p>
                    <p class="restaurant_genre">#{{$restaurant->genre->genre}}</p>
                </div>
                <div class="restaurant_submit">
                    <form class="restaurant_submit-details" action="/details" method="POST">
                    @csrf
                        <input type="hidden" name="restaurant_details" id="restaurant_details" value="{{json_encode($restaurant)}}">
                        <button class="restaurant_info">詳しくみる</button>
                    </form>

                        @if($restaurant->likes->contains('user_id', $user_id))
                            <form class="restaurant_submit-likes" action="/dislike" method="POST">
                            @method('DELETE')
                            @csrf
                                <input type="hidden" name="shop_delete" id="shop_delete" value="{{json_encode($restaurant)}}">
                                <button class="restaurant_dislike">❤︎</button>
                            </form>
                        @else
                            <form class="restaurant_submit-likes" action="/like" method="POST">
                            @csrf
                                <input type="hidden" name="shop_like" id="shop_like" value="{{json_encode($restaurant)}}">
                                <button class="restaurant_like">❤︎</button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    @endforeach

    </div>
@endsection
