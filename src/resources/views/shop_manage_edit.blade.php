@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shop_manage_edit.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
<div class="edit_contents">
    <div class="edit_title-inner">
        <h3 class="edit_title">掲載情報の編集</h3>
    </div>
    <form action="/manage-shop/edit/update" method="post">
        @csrf
        <table class="table">
            <tr class="table_contents-row">
                <th class="table_contents">店名</th>
                <td class="table_contents"><input class="edit_input" type="text" name="name" value="{{$shop_info['0']['name']}}"></td>
            </tr>
            <tr class="table_contents-row">
                <th class="table_contents">エリア</th>
                <td class="table_contents">
                    <select class="edit_input" name="area_id" id="edit_area_input">
                    @foreach($area_info as $info)
                    <option  value="{{$info->id}}">{{$info->id}}-{{$info->area}}</option>
                    @endforeach
                </td>
            </tr>
            <tr class="table_contents-row">
                <th class="table_contents">ジャンル</th>
                <td class="table_contents">
                    <select class="edit_input" name="genre_id" id="edit_genre_input">
                    @foreach($genre_info as $info)
                    <option value="{{$info->id}}">{{$info->id}}-{{$info->genre}}</option>
                    @endforeach
                </td>
            </tr>
            <tr class="table_contents-row">
                <th class="table_contents">写真</th>
                <td class="table_contents">
                    <select class="edit_input" name="picture" id="edit_pic_input">
                    @foreach($pic_info as $info)
                    <option>{{$info}}</option>
                    @endforeach
                </td>
            </tr>
            <tr class="table_contents-row">
                <th class="table_contents-sentence">説明文</th>
                <td class="table_contents-sentence"><textarea class="edit_sentence" name="contents" cols="30" rows="10" >{{$shop_info['0']['contents']}}</textarea></td>
            </tr>
        </table>
        <div class="edit_submit-inner">
            <button class="edit_submit" type="submit">更新</button>
        </div>
    </form>

    <div>
        <div class="edit_title-inner">
            <h3 class="edit_title">新規情報追加</h3>
        </div>
        <table class="table">
            <tr class="table_contents-row">
                <th class="table_contents">エリア</th>
                <th class="table_contents">ジャンル</th>
                <th class="table_contents">写真</th>
            </tr>
            <tr class="table_contents-row">
                <td class="table_contents">
                    <form class="new_add" action="/manage-shop/edit/add" method="post">
                        @csrf
                        <input class="new_add-input" type="text" name="area">
                        <button class="new_add-submit" type="submit">追加</button>
                    </form>
                </td>
                <td class="table_contents">
                    <form class="new_add" action="/manage-shop/edit/add" method="post">
                        @csrf
                        <input class="new_add-input" type="text" name="genre">
                        <button class="new_add-submit" type="submit">追加</button>
                    </form> 
                </td>
                <td class="table_contents-pic">
                    <form class="new_add" action="/manage-shop/edit/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="new_add-input" type="file" name="file" id="file">
                        <button class="new_add-submit" type="submit">追加</button>
                    </form>
                    
                </td>
            </tr>
        </table>
    </div>
</div>



@endsection