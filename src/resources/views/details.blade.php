@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/details.css') }}" />
@endsection

@section('header')

@endsection

@section('content')

    <div class="contents">
        <div class="restaurant">
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
        <button class="back" onclick="goBack()">＜</button>
            <p class="restaurant_name">{{$restaurant['name']}}</p>
            <img class="restaurant_pic" src="{{ asset($restaurant['picture']) }}" alt="写真">
            <p class="restaurant_area">#{{$restaurant['area']['area']}}</p>
            <p class="restaurant_genre">#{{$restaurant['genre']['genre']}}</p>
            <p class="restaurant_sentence">{{$restaurant['contents']}}</p>            
        </div>

        <div class="booking">

            <p class="booking_title">予約</p>
            <form class="restaurant_details" id="booking_form" action="/done" method="POST">
            @csrf
                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant['id']}}">
                <input type="hidden" name="restaurant_name" id="restaurant_name" value="{{$restaurant['name']}}">
                <input class="booking_date" type="date" name="booking_date" id="booking_date_input">
                @error('booking_date')
                    <div class="alert_danger">{{ $message }}</div>
                @enderror
                    <select class="booking_time" name="booking_time" id="booking_time_input">
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                    </select>
                    <select  class="booking_number" name="booking_person" id="booking_person_input">
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                    </select>


                <div class="booking_confirmation" id="confirmation"></div>

                

                <script>

                    function getFormattedDate() {
                        const today = new Date();
                        today.setDate(today.getDate() + 1);
                        const year = today.getFullYear();
                        const month = String(today.getMonth() + 1).padStart(2, '0');
                        const day = String(today.getDate()).padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    }

                    // 初期状態で本日の日付を設定する
                    document.addEventListener('DOMContentLoaded', (event) => {
                        document.getElementById('booking_date_input').value = getFormattedDate();
                    });



                    document.addEventListener('DOMContentLoaded', function() {
                        const bookingForm = document.getElementById('booking_form');
                        const bookingDateInput = document.getElementById('booking_date_input');
                        const bookingTimeInput = document.getElementById('booking_time_input');
                        const bookingPersonInput = document.getElementById('booking_person_input');
                        const confirmation = document.getElementById('confirmation');
                        const shop = "<?php echo $restaurant['name']; ?>";

                    function updateConfirmation() {
                    const bookingDate = bookingDateInput.value;
                    const bookingTime = bookingTimeInput.value;
                    const bookingPerson = bookingPersonInput.value;

                    confirmation.innerHTML = 
                                          
                        `<table class="confirm">
                            <tr class="confirm_row">
                                <td  class="confirm_elements">Shop</td>
                                <td class="confirm_elements">${shop}</td>
                            </tr>
                            <tr class="confirm_row">
                                <td class="confirm_elements">Date</td>
                                <td class="confirm_elements">${bookingDate}</td>
                            </tr>
                            <tr class="confirm_row">
                                <td class="confirm_elements">Time</td>
                                <td class="confirm_elements">${bookingTime}</td>
                            </tr>
                            <tr class="confirm_row">
                                <td class="confirm_elements">Number</td>
                                <td class="confirm_elements">${bookingPerson}人</td>
                            </tr>
                        </table>
                        `;
                    }
                    updateConfirmation();
                    bookingForm.addEventListener('input', updateConfirmation);
                });
 
                </script>

                <button class="booking_send">予約する</button>
            </form>
        </div>
    </div>
@endsection
