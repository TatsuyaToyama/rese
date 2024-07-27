@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/reviewed.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
    <div class="contents">
            <p class="thanks">ご意見ありがとうございます</p>
        <script>
          function goBack() {
              window.history.back();
          }
        </script>
    <button class="back" onclick="goBack()">戻る</button>
    </div>
@endsection
