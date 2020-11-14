<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', 'ProductController@index');
// Route::get('/create', 'ProductController@create');

Route::get('/', [ProductController::class, 'index']);

Route::get('/create', [ProductController::class, 'create']);
Route::post('/create', [ProductController::class, 'store'])->name('product.store');

Route::get('/{id}', [ProductController::class, 'read']);
Route::get('/{id}/edit', [ProductController::class, 'edit']);