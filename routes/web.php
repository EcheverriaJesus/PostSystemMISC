<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('product', App\Http\Controllers\ProductController::class);

Route::resource('sale', App\Http\Controllers\SaleController::class);

Route::resource('order', App\Http\Controllers\OrderController::class);

Route::resource('sale_detail', App\Http\Controllers\Sale_detailController::class);

Route::resource('debt', App\Http\Controllers\DebtController::class);

Route::any('debt',[DebtController::class, 'search'])->name('debt.search');
