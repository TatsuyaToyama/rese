<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/search', [BookingController::class, 'search']);
Route::post('/search', [BookingController::class, 'search']);
Route::get('/details', [BookingController::class, 'details']);
Route::post('/details', [BookingController::class, 'details']);
Route::get('/menu', [BookingController::class, 'menu']);

Route::middleware(['verified'])->group(function(){
    Route::get('/registerd', [BookingController::class, 'registerd']);
    Route::post('/like', [BookingController::class, 'like']);
    Route::delete('/dislike', [BookingController::class, 'dislike']);
    Route::get('/done', [BookingController::class, 'done']);
    Route::post('/done', [BookingController::class, 'done']);
    Route::get('/mypage', [BookingController::class, 'mypage']);
    Route::post('/mypage/review', [BookingController::class, 'review']);
    Route::delete('/mypage/dislikes', [BookingController::class, 'dislikes']);
    Route::post('/modify', [BookingController::class, 'modify']);
    Route::delete('/modify/delete', [BookingController::class, 'delete']);
    Route::patch('/modified', [BookingController::class, 'modified']);
    Route::get('/modified', [BookingController::class, 'modified']);
    Route::get('/manage-all', [BookingController::class, 'all_manage']);
    Route::post('/manage-shop', [BookingController::class, 'shop_manage']);
    Route::post('/manage-shop/send', [EmailController::class, 'sendEmail']);
    Route::post('/manage-shop/visited', [BookingController::class, 'shop_visited']);

    Route::post('/manage-shop/amount', [PaymentController::class, 'amount']);
    Route::patch('/manage-shop/amount', [PaymentController::class, 'amount']);
    // Route::get('/manage-shop/amount', [PaymentController::class, 'amount']);
    Route::POST('/charge', [PaymentController::class, 'charge']);

    Route::post('/manage-all/add', [BookingController::class, 'manage_add']);
    Route::post('/manage-shop/edit', [BookingController::class, 'manage_shop_edit']);
    Route::get('/manage-shop/edit', [BookingController::class, 'manage_shop_edit']);
    Route::post('/manage-shop/edit/upload', [BookingController::class, 'shop_manage_upload']);
    Route::post('/manage-shop/edit/add', [BookingController::class, 'shop_manage_add']);
    Route::post('/manage-shop/edit/update', [BookingController::class, 'shop_manage_update']);
    Route::get('/checkout', function () {
    return view('checkout');
});



});
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
