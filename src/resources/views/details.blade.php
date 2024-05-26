@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/details.css') }}" />
@endsection

@section('header')

@endsection

@section('content')

    <div class="contents">
        <div class="restaurant">
            <a href="/">＜</a>  
            <p class="restaurant_name">{{$restaurant['name']}}</p>
            <img class="restaurant_pic" src="{{ asset($restaurant['picture']) }}" alt="写真">
            <p class="restaurant_area">#{{$restaurant['area']['area']}}</p>
            <p class="restaurant_genre">#{{$restaurant['genre']['genre']}}</p>
            <p class="restaurant_genre">#{{$restaurant['contents']}}</p>            
        </div>

        <div class="booking">

            <p class="title">予約</p>
            <form class="restaurant_details" id="booking_form" action="/done">
            @csrf
                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant['id']}}">
                <input type="hidden" name="restaurant_name" id="restaurant_name" value="{{$restaurant['name']}}">
                <input type="date" name="booking_date" id="booking_date_input">
                    <select name="booking_time" id="booking_time_input">
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                    </select>
                    <select name="booking_person" id="booking_person_input">
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                    </select>


                <div class="booking_confirmation" id="confirmation"></div>

                

                <script>
                    const bookingForm = document.getElementById('booking_form');
                    const bookingDateInput = document.getElementById('booking_date_input');
                    const bookingTimeInput = document.getElementById('booking_time_input');
                    const bookingPersonInput = document.getElementById('booking_person_input');
                    const confirmation = document.getElementById('confirmation');

                    bookingForm.addEventListener('input', function() {
                        const bookingDate = bookingDateInput.value;
                        const bookingTime = bookingTimeInput.value;
                        const bookingPerson = bookingPersonInput.value;

                        confirmation.innerHTML = 
                        `   <p>予約日: ${bookingDate}</p>
                            <p>予約時間: ${bookingTime}</p>
                            <p>予約人数: ${bookingPerson}人</p>
                        `;
                    });
                </script>

                <button class="booking_send">予約する</button>
            </form>
        </div>

    </div>
@endsection
