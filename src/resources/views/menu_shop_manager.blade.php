
@extends('layouts.apphome_menu')

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

<!-- 店舗代表者ページに飛べるようにする -->

@if(!is_null($manager_all) && count($manager_all) > 0)
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

