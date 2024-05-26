@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu_login.css') }}" />
@endsection

@section('header')

@endsection

@section('content')

<p>menu-login</p>
    <a href="/">Home</a>
    <a href="/logout">Logout</a>
    <a href="/mypage">Mypage</a>
@endsection