@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/all_manage.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
<div>
  <h2>管理者画面</h2>
</div>
<div>
  <p>代表者の追加</p>
</div>
<div>
<form action="/manage-all/add" method="post">
  @csrf
  <table>
      <tr>
          <th>ユーザー名</th>
          <th>管理店舗名</th>
      </tr>
      <th>
          <td>
              <select name="add_user" id="add_user_input">
              @foreach($user_add as $user)
                  <option>{{$user->id}}-{{$user->name}}</option>
              @endforeach
              </select>
          </td>
          <td>
              <select name="add_shop" id="add_shop_input">
              @foreach($shop_add as $shop)
                  <option>{{$shop->id}}-{{$shop->name}}</option>
              @endforeach
              </select>
          </td>
      </th>
  </table>
  <button type="submit">追加する</button>
</form>
</div>


<div>
  <p>店舗代表者一覧</p>
  <table>
    <tr class="table_contents-row">
      <th class="table_contents-th">ユーザーID</th>
      <th class="table_contents-th">ユーザー名</th>
      <th class="table_contents-th">管理店舗ID</th>
      <th class="table_contents-th">管理店舗名</th>
    </tr>
    
    @foreach($shop_managers as $all_item)
    <tr>
      <td class="table_contents-td">{{$all_item['user_id']}}</td>
      <td class="table_contents-td">{{$all_item->user->name}}</td>
      <td class="table_contents-td">{{$all_item['managed_shop_id']}}</td>
      <td class="table_contents-td">{{$all_item->shop->name}}</td>
    </tr>  
    @endforeach  
  </table>
  </div>


@endsection