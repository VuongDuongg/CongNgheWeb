<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');


// Lưu sách mới
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Form sửa sách
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Cập nhật sách
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Xóa sách
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
