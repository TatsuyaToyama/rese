@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/registerd.css') }}" />
@endsection

@section('header')

@endsection

@section('content')     
<div class="contents">
    <p class="thanks">正常に支払われました</p>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <button class="back_amount" onclick="goBack()">戻る</button>
</div>

@endsection