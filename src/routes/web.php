<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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
Route::post('/like', [BookingController::class, 'like']);
Route::delete('/dislike', [BookingController::class, 'dislike']);
Route::get('/details', [BookingController::class, 'details']);
Route::post('/details', [BookingController::class, 'details']);
Route::get('/done', [BookingController::class, 'done']);
Route::post('/done', [BookingController::class, 'done']);
Route::get('/menu', [BookingController::class, 'menu']);
Route::get('/mypage', [BookingController::class, 'mypage']);
Route::delete('/mypage/dislikes', [BookingController::class, 'dislikes']);
Route::post('/modify', [BookingController::class, 'modify']);
Route::patch('/modified', [BookingController::class, 'modified']);
Route::get('/modified', [BookingController::class, 'modified']);
Route::get('/manage-all', [BookingController::class, 'all_manage']);
Route::post('/manage-shop', [BookingController::class, 'shop_manage']);
Route::post('/manage-all/add', [BookingController::class, 'manage_add']);
Route::post('/manage-shop/edit', [BookingController::class, 'manage_shop_edit']);
Route::get('/manage-shop/edit', [BookingController::class, 'manage_shop_edit']);
Route::post('/manage-shop/edit/upload', [BookingController::class, 'shop_manage_upload']);
Route::post('/manage-shop/edit/add', [BookingController::class, 'shop_manage_add']);
Route::post('/manage-shop/edit/update', [BookingController::class, 'shop_manage_update']);

