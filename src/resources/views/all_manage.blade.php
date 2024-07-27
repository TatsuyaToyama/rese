@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/all_manage.css') }}" />
@endsection

@section('header')
<div class="manager_title-inner">
  <h2 class="manager_title">管理者画面</h2>
</div>

@endsection

@section('content')
<div class="manager_add-inner">
  <h3 class="manager_add">代表者の追加</h3>
</div>
<div>
  <form action="/manage-all/add" method="post">
  @csrf
  <table class="table">
      <tr class="table_contents-row">
          <th class="table_contents">ユーザー名</th>
          <th class="table_contents">管理店舗名</th>
      </tr>
      <tr class="table_contents-row">
          <td class="table_contents">
              <select class="add_user" name="add_user" id="add_user_input">
              @foreach($user_add as $user)
                  <option>{{$user->id}}-{{$user->name}}</option>
              @endforeach
              </select>
          </td>
          <td class="table_contents">
              <select class="add_shop" name="add_shop" id="add_shop_input">
              @foreach($shop_add as $shop)
                  <option>{{$shop->id}}-{{$shop->name}}</option>
              @endforeach
              </select>
          </td>
      </tr>
  </table>
  <div class="submit-inner">
    <button class="add_submit" type="submit">追加する</button>
  </div>
</form>
</div>


<div>
  <div class="shop_manager-title-inner">
    <h3 class="shop_manager-title">店舗代表者一覧</h3>
  </div>
    <table class="table">
      <tr class="table_contents-row">
        <th class="table_contents">ユーザーID</th>
        <th class="table_contents">ユーザー名</th>
        <th class="table_contents">管理店舗ID</th>
        <th class="table_contents">管理店舗名</th>
      </tr>
      
      @foreach($shop_managers as $all_item)
      <tr class="table_contents-row">
        <td class="table_contents">{{$all_item['user_id']}}</td>
        <td class="table_contents">{{$all_item->user->name}}</td>
        <td class="table_contents">{{$all_item['managed_shop_id']}}</td>
        <td class="table_contents">{{$all_item->shop->name}}</td>
      </tr>  
      @endforeach  
    </table>
  </div>


@endsection