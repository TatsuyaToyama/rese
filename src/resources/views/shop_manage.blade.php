
@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shop_manage.css') }}" />
@endsection

@section('header')
<div class="shop_manage-inner">
  <h2 class="shop_manage-title">店舗管理画面</h2>
</div>


@endsection

@section('content')
<div class="shop_manager-edit">
  <form class="shop_manager-form" action="/manage-shop/edit">
    @csrf
    <input type="hidden"name="shop_id" id="shop_id" value="{{$shop_id['shop_details']}}" method="POST">
    <button class="shop_manager-submit">掲載情報の編集</button>
  </form>
</div>

<div class="shop_manager-books">
  <div class="shop_manager-inner">
    <h3 class="shop_manager-title">予約一覧</h3>
  </div>
  <table class="table">
    <tr class="table_contents-row">
      <th class="table_contents">ユーザーID</th>
      <th class="table_contents">ユーザー名</th>
      <th class="table_contents">予約日</th>
      <th class="table_contents">予約時間</th>
      <th class="table_contents">予約人数</th>
      <th class="table_contents">来店</th>
      <th class="table_contents">支払い金額を入力</th>
    </tr>
    
    @foreach($book_all as $all_item)
    <tr>
      <td class="table_contents">{{$all_item->user->id}}</td>
      <td class="table_contents">{{$all_item->user->name}}</td>
      <td class="table_contents">{{$all_item->date}}</td>
      <td class="table_contents">{{$all_item->time}}</td>
      <td class="table_contents">{{$all_item->number}}</td>
      <td class="table_contents">
        @if($all_item->visited == 0)
                    <form class="shop_visited" action="/manage-shop/visited" method="POST">
                    @csrf
                        <input type="hidden" name="shop_visited" value="1"> 
                        <input type="hidden" name="book" value="{{$all_item}}"> 
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$shop_id['shop_details']}}">
                        <button class="shop_visited">来店済にする</button>
                    </form>
                @else
                    <form class="shop_visited" action="/manage-shop/visited" method="POST">
                    @csrf
                        <input type="hidden" name="shop_visited" value="0">
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$shop_id['shop_details']}}">
                        <input type="hidden" name="book" value="{{$all_item}}"> 
                        <button class="shop_visited">未来店にする</button>
                    </form>
                @endif

      </td>
      <td class="table_contents">
        <form class="shop_amount" action="/manage-shop/amount" method="POST">
            @method('PATCH')  
            @csrf
            <input type="number" name="amount" id="amount">
            <input type="hidden" name="book" value="{{$all_item}}"> 
            <button class="shop_visited">金額を登録</button>
        </form>
      </td>
    </tr>  
    @endforeach  
  </table>
</div>



<div class="send_mail">
  <div class="send_mail-title-inner">
    <h3 class="send_mail-title">顧客への一斉送信</h3>
  </div>
  <form action="/manage-shop/send" method="POST">
        @csrf
        <table class="table-email">
          <tr class="table_contents-row-email">
            <th class="table_contents-title">タイトル</th>
            <td class="table_contents-title"><input type="mail_text" id="subject" name="subject" required></td>
          </tr>
          <tr>
            <th class="table_contents-contents">内容</th>
            <td class="table_contents-contents"><textarea class="email_contents"id="mail_body" name="body" required></textarea></td>
          </tr>
        </table>
        <div class="send_email-submit-inner">
          <button class="send_email-submit" type="submit">メールを送信</button>
        </div>
    </form>
</div>

@endsection

