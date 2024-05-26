@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shop_manage.css') }}" />
@endsection

@section('header')

@endsection

@section('content')
shop_manage


<div>
    <div>
    <p>掲載情報の編集</p>
    <form action="/manage-shop/edit/update" method="post">
        @csrf
        <table>
            <tr>
                <th>店名</th>
                <td><input type="text" name="name" value="{{$shop_info['0']['name']}}"></td>
            </tr>
            <tr>
                <th>エリア</th>
                <td>
                    <select name="area_id" id="edit_area_input">
                    @foreach($area_info as $info)
                    <option  value="{{$info->id}}">{{$info->id}}-{{$info->area}}</option>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>ジャンル</th>
                <td>
                    <select name="genre_id" id="edit_genre_input">
                    @foreach($genre_info as $info)
                    <option value="{{$info->id}}">{{$info->id}}-{{$info->genre}}</option>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>写真</th>
                <td>
                    <select name="picture" id="edit_pic_input">
                    @foreach($pic_info as $info)
                    <option>{{$info}}</option>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>説明文</th>
                <td><input type="text" name="contents" value="{{$shop_info['0']['contents']}}"></td>
            </tr>
        </table>
        <button type="submit">更新</button>
    </form>
    </div>

    <div>
        <p>新規情報追加</p>
        <form action=""></form>
        <table>
            <tr>
                <th>エリア</th>
                <th>ジャンル</th>
                <th>写真</th>
            </tr>
            <tr>
                <td>
                    <form action="/manage-shop/edit/add" method="post">
                        @csrf
                        <input type="text" name="area">
                        <button type="submit">追加</button>
                    </form>
                </td>
                <td>
                    <form action="/manage-shop/edit/add" method="post">
                        @csrf
                        <input type="text" name="genre">
                        <button type="submit">追加</button>
                    </form> 
                </td>
                <td>
                    <form action="/manage-shop/edit/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="file">ファイルを選択:</label>
                        <input type="file" name="file" id="file">
                        <button type="submit">追加</button>
                    </form>
                    
                </td>
            </tr>
        </table>



    </div>



</div>



@endsection