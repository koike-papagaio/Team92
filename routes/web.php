<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// 会員登録画面
Route::get('/member_register', [App\Http\Controllers\Member_registerController::class, 'index']);
Route::post('/member_register', [App\Http\Controllers\Member_registerController::class, 'register']);

// 会員編集画面
Route::get('/member_edit/{id}', [App\Http\Controllers\Member_editController::class, 'index']);
Route::post('/member_edit', [App\Http\Controllers\Member_editController::class, 'edit']);

//  ログイン画面
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

// 商品登録画面
Route::get('/product_register', [App\Http\Controllers\Product_registerController::class, 'index']);
Route::post('/product_register', [App\Http\Controllers\Product_registerController::class, 'register']);

// 商品編集画面
Route::get('/product_edit/{id}', [App\Http\Controllers\Product_editController::class, 'index']);
Route::post('/product_edit', [App\Http\Controllers\Product_editController::class, 'edit']);

// 商品管理画面
Route::get('/product_management', [App\Http\Controllers\Product_managementController::class, 'index']);
Route::get('/product_delete/{id}', [App\Http\Controllers\Product_managementController::class, 'delete']);
