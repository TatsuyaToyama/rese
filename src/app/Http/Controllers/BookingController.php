<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\book;
use App\Models\like;
use App\Models\Role;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    public function index(){
        $user = Auth::user();
        if (isset($user['name'])) {

        #店の情報をテーブルから抽出、Likeテーブルから情報を抽出し、Indexに持っていく
        $user_id = $user->id;
        $restaurants_all= Shop::with('area', 'genre','likes')->get();

        }else{
        // 特にログインしていない時、
        $user_id=[];
        $restaurants_all= Shop::with('area', 'genre')->get();
        }

        return view('index',compact('restaurants_all','user_id'));
    }

    public function like(Request $request){
        $user = Auth::user();
        $restaurant = json_decode($request -> input(['shop_like']),true);
        if (isset($user['name'])) {
            // Likesテーブルに格納
            $shop_id=$restaurant['id'];
            $like_item=[
                'user_id' => $user->id,
                'shop_id' => $shop_id
            ];
            like::create($like_item);
            return redirect('/');
        }else{
            // ログインしていない場合、ログインに誘導
             return view('pleaselogin');
        }
    }

    public function dislike(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $restaurant = json_decode($request -> input(['shop_delete']),true);
        $shop_id=$restaurant['id'];
        like::where('shop_id', $shop_id)
            ->where('user_id', $user_id)
            ->delete();
        return redirect('/');
    }

    public function details(Request $request){
        // 個別ページに行った時に紹介と予約のページに行く
        // その時に、どの店の情報を押したかのデータを取得し、detailsページに渡す
        if($request->has('user_id')){
            $restaurant = $request->only('shop');

        }else{
            $restaurant = json_decode($request -> input(['restaurant_details']),true);
        }

        return view('details',['restaurant' =>$restaurant]);

    }


    public function done(Request $request){
        // 予約終了ページで取得した日時、人数のデータをテーブルに格納する
        $booking_info = $request->only(['restaurant_id','booking_date','booking_time','booking_person']);
        $user = Auth::user();
        if (isset($user['name'])) {
            $user_id = $user->id;
            $book = [
                'user_id' => $user_id,
                'shop_id' => $booking_info['restaurant_id'],
                'date' => $booking_info['booking_date'],
                'time' => $booking_info['booking_time'],
                'number' => $booking_info['booking_person']
            ];
            Book::create($book);
            return view('done',['book' =>$book]);
            
        }else{
            // ログインを誘導
            return view('pleaselogin');
        }
    }


    public function menu(){
        #ログインをしているかどうかで判断をする
        $user = Auth::user();
        
        // ログインをしている時、Menu-login
        if (isset($user['name'])) {
            $user_id = $user->id;
            $manager_all=Role::where('user_id',$user_id)->with('shop')->get();
            // ユーザーIdでRoleに該当しているIDがあるかを確認
            if($manager_all !==null){
                // managerだったら、menu-managerに接続
                $mult=1;
                // $manager_all['manager']の０．１の値を全て掛け合わせ・足し合わせする
                for($i=0; $i<count($manager_all); $i++){
                    $mult *= $manager_all[$i]['manager'];
                }

                if($mult==0){
                    // shopmanagerなら、menu-shopmanagerに接続。その際に、該当するShopIdをすべて取得して渡す。
                    $filtered_array = [];
                        for ($i = 0; $i < count($manager_all); $i++) {
                            if ($manager_all[$i]['manager'] != 0) {
                                $filtered_array[] = $manager_all[$i];
                            }
                        }
                        $manager_all = $filtered_array;
                    
                    return view('menu_manager',['manager_all' =>$manager_all]);
                }else{
                    return view('menu_shop_manager',['manager_all' =>$manager_all]);
                }

            }else{
            // Roleテーブルで該当がない場合、顧客としてログイン
            return view('menu_login');
            }
        }else{
        // ログインをしていない時、Menu-logout
        return view('menu_logout');
        }
    }

    public function mypage(){
        // 予約情報とお気に入り情報をテーブルから取得しひきわたす
        $user = Auth::user();
        $user_id = $user->id;
        $user_name = $user->name;
        $book_item= book::where('user_id', $user_id)
                    ->with('shop')
                    ->get();               
        $like_item= like::where('user_id', $user_id)
                    ->with('shop')
                    ->with('area','genre')
                    ->get();
        return view('mypage', compact('user_name','book_item', 'like_item'));
    }

    public function dislikes(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $restaurant = json_decode($request -> input(['shop_delete']),true);
        $shop_id = $restaurant['shop_id'];
        like::where('shop_id', $shop_id)
            ->where('user_id', $user_id)
            ->delete();
        return redirect('/mypage');
    }


    public function modify(Request $request){
        // myPageで押された特定の予約の詳細情報をテーブルから取得
        // その時、ログインしている名前？メール？で特定を行う
        $user = Auth::user();
        $user_id = $user->id;
        $book_details = json_decode($request -> input(['book_details']),true);
        $book_qr=$book_details;
        // unset($booK_qr['content']);
        $jsonString = json_encode($book_qr);
        $qr_code = QrCode::size(300)->generate($jsonString);


        return view('modify',compact('user_id','book_details','qr_code'));
    }

    public function modified(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $book_modified = $request->all();
        unset($book_modified['_token']);
        $book_modified['user_id']=$user_id;
        book::find($book_modified['id'])->update($book_modified);
        return view('done');
    }

    public function all_manage(){
        $shop_managers = Role::where('manager',1)->with('user','shop')->get();
        $shop_add=shop::get();
        $user_add=User::get();
        return view('all_manage',compact('shop_add','user_add','shop_managers'));

    }
    public function manage_add(Request $request){
        $add_item =[
            'user_id' => $request ->add_user,
            'manager' => "1",
            'managed_shop_id' => $request ->add_shop
        ];

        Role::create($add_item);
        
        // 必要に応じてバリデーションの結果を示すようにする（被りがある場合、被りがあることを示す）
        return redirect('/manage-all');
    }

    public function shop_manage(Request $request){
        
        $shop_id = $request->only('shop_details');
        $book_all=book::where('shop_id',$shop_id['shop_details'])->with('user','shop')->get();
        return view('shop_manage',compact('book_all','shop_id'));
    }

    public function manage_shop_edit(Request $request){
        $shop_id = $request->only('shop_id');
        //！追加で戻ってきた時にShop_idはないから、おーるどにいれておく！！
        if($shop_id !== null){
            $request->session()->put([
                '_old_input' => [
                    'shop_id' => $shop_id
                ]
                ]);
        }else{
            $shop_id = $request->query('shop_id');
        }
        
        $shop_info = shop::where('id',$shop_id)->with('area','genre')->get();
        $area_info=Area::get();
        $genre_info=Genre::get();
        $pic_info = Storage::disk('public')->files();
        
        return view('shop_manage_edit',compact('shop_info','area_info','genre_info','pic_info'));
    }


    public function shop_manage_upload(Request $request){
        $shop_info = $request->session()->get('_old_input.shop_id');
        $shop_id =$shop_info['shop_id'];
        $file = $request->file('file');
        $originalFileName = $file->getClientOriginalName();
        $path = $file->storeAs('public', $originalFileName);
        //！ 同じファイルがあったらバリデーションでエラーが出るようにする！！
        return redirect(url('/manage-shop/edit?shop_id=' . $shop_id))->with('success', 'ファイルがアップロードされました。')->with('path', $path);
    }

    public function shop_manage_add(Request $request){
        $shop_info = $request->session()->get('_old_input.shop_id');
        $shop_id =$shop_info['shop_id'];
        
        $area_add=$request->only('area');
        $genre_add=$request->only('genre');

        if(!empty($area_add['area'])){
            Area::create($area_add);
        }
        if(!empty($genre_add['genre'])){
            Genre::create($genre_add);
        }
        //！ 同じファイルがあったらバリデーションでエラーが出るようにする！！
        return redirect(url('/manage-shop/edit?shop_id=' . $shop_id))->with('success', 'ファイルがアップロードされました。');
    }

    public function shop_manage_update(Request $request){
        $shop_info = $request->session()->get('_old_input.shop_id');
        

        $shop_edit = $request -> only(['name','area_id','genre_id','contents','picture']);
        $shop_edit['picture'] = 'storage/' . $shop_edit['picture'];
        Shop::where('id',$shop_info)->update($shop_edit);

        $shop_id =$shop_info['shop_id'];
        return redirect(url('/manage-shop/edit?shop_id=' . $shop_id))->with('success', 'ファイルがアップロードされました。');
    }

    

}




