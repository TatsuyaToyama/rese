@extends('layouts.apphome_no_menu')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
<div class="menu">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <button class="back" onclick="goBack()">×</button>
    <a class="home" href="/">Home</a>
    <a class="logout" href="/logout">Logout</a>
    <a class="mypage" href="/mypage">Mypage</a>
</div>
@endsection