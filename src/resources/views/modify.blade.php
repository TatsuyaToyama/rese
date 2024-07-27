@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/modify.css') }}" />
@endsection

@section('header')
<div class="confirm_title-inner">
    <h2 class="confirm_title">予約の確認</h2>
</div>

@endsection

@section('content')

<div class="change_contents">
    <div class="booking">
        <div class="book_change-title-inner">
            <h3 class="book_change-title">予約変更</h3>
        </div>
            <form class="book_change-form" id="booking_form" action="/modified" method="POST">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" id="id" value="{{$book_details['id']}}">
                <input type="hidden" name="shop_id" id="shop_id" value="{{$book_details['shop_id']}}">
                <table>
                    <tr class="table_contents-row">
                        <th class="table_contents">shop</th>
                        <td class="table_contents">{{$book_details['shop']['name']}}</td>
                    </tr>
                    <tr class="table_contents-row">
                        <th class="table_contents">date</th>
                        <td class="table_contents">
                            <input class="change_date" type="date" name="date" id="booking_date_input" value="{{$book_details['date']}}">
                        </td>
                    </tr>
                    <tr class="table_contents-row">
                        <th class="table_contents">time</th>
                        <td class="table_contents">
                            <select class="change_time" name="time" id="booking_time_input" value="{{$book_details['time']}}">
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="table_contents-row">
                        <th class="table_contents">number</th>
                        <td class="table_contents">
                            <select class="change_number" name="number" id="booking_person_input" value="{{$book_details['number']}}">
                                <option value="1">1人</option>
                                <option value="2">2人</option>
                                <option value="3">3人</option>
                                <option value="4">4人</option>
                                <option value="5">5人</option>
                                <option value="6">6人</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="books_change-submit">変更する</button>
            </form>

            <form class="books_delete" action="/modify/delete" method="POST">
                @method('DELETE')
                @csrf
                    <input type="hidden" name="book_details" value="{{json_encode($book_details)}}">
                    <button class="books_delete-submit">予約を削除する</button>
            </form>
    </div>

    <div class="confirm_book">
        <div class="confirm_book-inner">
            <h3 class="confirm_book-title">現在の予約のQRコード</h3>
        </div>
        <div class="confirm_qr">
            <p class="qr">{!!$qr_code!!}</p>
        </div>
        @if($amount !== null)
        <form class="payment" action="/charge" method="POST" id="payment-form">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-description="Example charge"
                data-amount="{{$amount}}"
                data-currency="JPY"
                data-locale="auto">
            </script>
        </form>
        @endif    
    </div>
</div>

@endsection
