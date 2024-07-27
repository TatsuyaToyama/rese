@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/all_manage.css') }}" />
@endsection

@section('header')
<div class="manager_title-inner">
  <h2 class="manager_title">管理者画面</h2>
</div>

@endsection

@section('content')

<form action="{{ route('charge') }}" method="POST" id="payment-form">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-description="Example charge"
            data-amount="1000"
            data-locale="auto">
        </script>
    </form>



@endsection