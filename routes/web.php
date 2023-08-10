<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;

//Route::get('/logout', function () {
//    return view('product.logout');
//});

// Routes untuk Menangani Controller
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::get('/logout', [LogoutController::class, 'index']);
Route::get('/report', [ReportController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);


Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);


Route::resource('/product', ProductController::class);

?>
