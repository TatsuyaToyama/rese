@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/menu_logout.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <!-- memo  -->
    <p>menu-logout</p>
    <a href="/">Home</a>
    <a href="/register">Registration</a>
    <a href="/login">Login</a>
@endsection