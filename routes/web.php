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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('views.index');
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'basket'])->name('buy.basket');
Route::get('/basket/{id}', [App\Http\Controllers\BasketController::class, 'destroy'])->name('buy.index');
Route::get('/confirmation', [App\Http\Controllers\ConfirmationController::class, 'confirmation'])->name('buy.confirmation');
Route::get('/completed', [App\Http\Controllers\CompletedController::class, 'completed'])->name('buy.completed');