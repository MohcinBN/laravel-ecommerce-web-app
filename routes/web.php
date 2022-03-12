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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    // dashboard routes
    Route::get('/dashboard', [App\Http\Controllers\BackendController::class, 'index'])->name('dashboard');

    //product routes
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/pdoucts-list', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::delete('/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
});
