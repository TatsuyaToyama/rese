
@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu_manager.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
manage


<p>menu-login</p>
    <a href="/">Home</a>
    <a href="/logout">Logout</a>
    <a href="/mypage">Mypage</a>

<!-- 統括管理者画面に飛べるようにする-->

    <a href="/manage-all">管理者画面</a>

<!-- Nullではないとき、全てをForeachで表す -->

@if($manager_all !== null)

    @foreach($manager_all as $item)
    <form action="/manage-shop" method="POST">
        @csrf
        <input type="hidden" name="shop_details" id="shop_details" value="{{$item->shop->id}}">
        <button>店舗管理画面ー{{$item->shop->name}}</button>
    </form>
    @endforeach

@endif

@endsection