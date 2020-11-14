<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', 'ProductController@index');
// Route::get('/create', 'ProductController@create');

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/create', [ProductController::class, 'store'])->name('product.store');

Route::get('/{id}', [ProductController::class, 'read'])->name('product.read');

Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/{id}/edit', [ProductController::class, 'update'])->name('product.update');

Route::delete('/{id}', [ProductController::class, 'delete'])->name('product.delete');
