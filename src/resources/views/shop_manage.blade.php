
@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shop_manage.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
shop_manage

<p>店舗管理画面</p>


<div>
  <form action="/manage-shop/edit">
    @csrf
    <input type="hidden"name="shop_id" id="shop_id" value="{{$shop_id['shop_details']}}" method="POST">
    <button>掲載情報の編集</button>
  </form>
</div>

<div>
  <p>予約一覧</p>
  <table>
    <tr class="table_contents-row">
      <th class="table_contents-th">ユーザーID</th>
      <th class="table_contents-th">ユーザー名</th>
      <th class="table_contents-th">予約日</th>
      <th class="table_contents-th">予約時間</th>
      <th class="table_contents-th">予約人数</th>
    </tr>
    
    @foreach($book_all as $all_item)
    <tr>
      <td class="table_contents-td">{{$all_item->user->id}}</td>
      <td class="table_contents-td">{{$all_item->user->name}}</td>
      <td class="table_contents-td">{{$all_item->date}}</td>
      <td class="table_contents-td">{{$all_item->time}}</td>
      <td class="table_contents-td">{{$all_item->number}}</td>
    </tr>  
    @endforeach  
  </table>
</div>

@endsection

