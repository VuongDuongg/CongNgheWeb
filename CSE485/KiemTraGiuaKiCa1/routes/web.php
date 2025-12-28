<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Redirect trang gốc về danh sách sách
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Danh sách sách
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Form thêm sách mới
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Lưu sách mới
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Form sửa sách
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

// Cập nhật sách
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

// Xóa sách
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
