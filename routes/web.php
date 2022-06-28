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

Route::get('/product_register', [App\Http\Controllers\Product_registerController::class, 'index']);
Route::post('/product_register', [App\Http\Controllers\Product_registerController::class, 'register']);

Route::get('/product_edit/{id}', [App\Http\Controllers\Product_editController::class, 'index']);
Route::post('/product_edit', [App\Http\Controllers\Product_editController::class, 'edit']);

Route::get('/product_management', [App\Http\Controllers\Product_managementController::class, 'index']);

Route::get('/buy_history', [App\Http\Controllers\Buy_historyController::class, 'index'])->name('buy_history');
Route::get('/purchase_information', [App\Http\Controllers\Purchase_informationController::class, 'index'])->name('purchase_information');

Route::post('/purchase_information/update/{id}', [App\Http\Controllers\Purchase_informationController::class, 'update'])->name('status/change');