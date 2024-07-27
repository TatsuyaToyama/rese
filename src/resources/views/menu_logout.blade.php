@extends('layouts.apphome_menu')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu_logout.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <button class="back" onclick="goBack()">×</button>
    <div class="menu-inner">
        <a class="home" href="/">Home</a>
        <a class="register" href="/register">Registration</a>
        <a class="login" href="/login">Login</a>
    </div>
@endsection