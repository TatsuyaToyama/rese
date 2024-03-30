<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class BookingController extends Controller
{
    public function index(){
        // 特定のアカウント（管理者と店の代表者）でログインしているかどうかを判断する
        // 管理者の時以下の動き

            //店舗代表者のテーブル情報を取得する
            // return view('allmanage');




            // 店の代表者の時、以下の動き
            // ？？？？？
            // return view('shopmanage');



        // 特にログインしていない時、もしくは顧客ログインの時
        #店の情報をテーブルから抽出し、Indexに持っていく
        $restaurants_all= Restaurant::all(); 
        return view('index',['restaurants_all' =>$restaurants_all]);
    }

    public function details(){
        // 個別ページに行った時に紹介と予約のページに行く
        // その時に、どの店の情報を押したかのデータを取得し、detailsページに渡す


        return view('details');

    }


    public function thanks(){
        // 予約終了ページで取得した日時、人数のデータをテーブルに格納する



        return view('thanks');

    }



    public function menu(){
        #ログインをしているかどうかで判断をする
        // ログインをしている時、Menu1

        // ログインをしていない時、Menu2

        return view('menu');
    }

    public function mypage(){
        // 予約情報とお気に入り情報をテーブルから取得しひきわたす
        // その時、ログインしている名前？メール？で特定を行う

        return view('mypage');
    }


    public function modify(){
        // myPageで押された特定の予約の詳細情報をテーブルから取得
        // その時、ログインしている名前？メール？で特定を行う

        return view('mypage');
    }






}


