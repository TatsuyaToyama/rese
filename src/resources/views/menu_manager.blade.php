
@extends('layouts.apphome_menu')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu_manager.css') }}" />
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
    <a class="logout" href="/logout">Logout</a>
    <a class="mypage" href="/mypage">Mypage</a>


<!-- 統括管理者画面に飛べるようにする-->

    <a class="manager" href="/manage-all">管理者画面</a>

<!-- Nullではないとき、全てをForeachで表す -->

@if($manager_all !== null)

    @foreach($manager_all as $item)
    <form class="shop_manager" action="/manage-shop" method="POST">
        @csrf
        <input type="hidden" name="shop_details" id="shop_details" value="{{$item->shop->id}}">
        <button class="shop_manager-button">店舗管理画面ー{{$item->shop->name}}</button>
    </form>
    @endforeach

@endif
</div>
@endsection