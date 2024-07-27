@extends('layouts.apphome_no_menu')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm_email.css') }}" />
@endsection


@section('header')
    <title>{{ $details['subject'] }}</title>
@endsection


@section('content')
        <p>{{ $details['body'] }}</p>
@endsection
