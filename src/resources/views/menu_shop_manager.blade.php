
@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menus_shop_manager.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
{{dd($manager_all)}}
shop_manage


<p>menu-login</p>
    <a href="/">Home</a>
    <a href="/logout">Logout</a>
    <a href="/mypage">Mypage</a>

<!-- 店舗代表者ページに飛べるようにする -->

<p>店舗代表者</p>
@foreach($manager_all as $item)
    <form action="/manage-shop" method="POST">
        @csrf
        <input type="hidden" name="shop_details" id="shop_details" value="{{$item->shop->id)}}">
        <button>店舗管理画面ー{{$item->shop->name}}</button>
    </form>
@endforeach

@endsection

