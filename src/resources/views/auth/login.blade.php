@extends('layouts.apphome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" /> -->

        <!-- @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif -->


        @if($errors->any())
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ $errors->first('error') }}
            </div>
        @endif
<div class="contents">
        <div class="logintitle">
            <p class="logintitle_content">Login</p>
        </div>

        <form class="input" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input_inner">
                <img class="icon" src="{{ asset('storage/icon/email.svg') }}" alt="写真">
                <input  class="input_inner-content" id="email" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="input_inner">
                <img class="icon" src="{{ asset('storage/icon/lock.svg') }}" alt="写真">
                <input class="input_inner-content" id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="input_inner">
                <button class="input_submit">
                    {{ __('ログイン') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</div>

@endsection