<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;

Route::get('/', function () {
    return redirect()->route('sinhvien.index');
});

Route::get('/sinhvien', [SinhVienController::class, 'index'])
    ->name('sinhvien.index');

Route::post('/sinhvien', [SinhVienController::class, 'store'])
    ->name('sinhvien.store');
