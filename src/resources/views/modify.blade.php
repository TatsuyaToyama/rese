@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/modify.css') }}" />
@endsection

@section('header')

@endsection

@section('content')

<div>
    <div class="booking">

            <p class="title">予約</p>
            <form class="restaurant_details" id="booking_form" action="/modified" method="POST">
            @method('PATCH')
            @csrf
            <p>店名：{{$book_details['shop']['name']}}</p>
                <input type="hidden" name="id" id="id" value="{{$book_details['id']}}">
                <input type="hidden" name="shop_id" id="shop_id" value="{{$book_details['shop_id']}}">
                <input type="date" name="date" id="booking_date_input" value="{{$book_details['date']}}">
                    <select name="time" id="booking_time_input" value="{{$book_details['time']}}">
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                    </select>
                    <select name="number" id="booking_person_input" value="{{$book_details['number']}}">
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                    </select>
                <button>変更する</button>
</div>

<p>QRコード</p>
    <div>
        {{!!$qr_code!!}}
    </div>

</div>

@endsection
