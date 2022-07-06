<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\CompletedController;

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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/product_detail/{id}', [\App\Http\Controllers\ProductController::class, 'product_detail']);
Route::post('/product_detail/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('add.basket');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

// 買い物かご画面
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'basket'])->name('buy.basket');
Route::get('/basket/{id}', [App\Http\Controllers\BasketController::class, 'destroy'])->name('buy.index');

// 購入確認画面
Route::get('/confirmation', [App\Http\Controllers\ConfirmationController::class, 'confirmation'])->name('buy.confirmation');

// 購入完了画面
Route::get('/completed', [App\Http\Controllers\CompletedController::class, 'completed'])->name('buy.completed');

// 会員登録画面
Route::get('/member_register', [App\Http\Controllers\Member_registerController::class, 'index']);
Route::post('/member_register', [App\Http\Controllers\Member_registerController::class, 'register']);

// 会員編集画面
Route::get('/member_edit/{id}', [App\Http\Controllers\Member_editController::class, 'index']);
Route::post('/member_edit', [App\Http\Controllers\Member_editController::class, 'edit']);

//  ログイン画面
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

// // 商品登録画面
Route::get('/product_register', [App\Http\Controllers\Product_registerController::class, 'index']);
Route::post('/product_register', [App\Http\Controllers\Product_registerController::class, 'register']);

// // 商品編集画面
Route::get('/product_edit/{id}', [App\Http\Controllers\Product_editController::class, 'index']);
Route::post('/product_edit', [App\Http\Controllers\Product_editController::class, 'edit']);

// // 商品管理画面
Route::get('/product_management', [App\Http\Controllers\Product_managementController::class, 'index']);
Route::get('/product_delete/{id}', [App\Http\Controllers\Product_managementController::class, 'delete']);

// 購入履歴画面
Route::get('/buy_history', [App\Http\Controllers\Buy_historyController::class, 'index'])->name('buy_history');

Route::get('/purchase_information', [App\Http\Controllers\Purchase_informationController::class, 'index'])->name('purchase_information');
Route::post('/purchase_information/update/{id}', [App\Http\Controllers\Purchase_informationController::class, 'update'])->name('status/change');
