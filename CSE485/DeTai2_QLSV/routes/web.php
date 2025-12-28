<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

/* ===== STUDENTS ===== */

// Danh sách
Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');


// Form thêm
Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

// Xử lý thêm
Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');
    
// Chi tiết
Route::get('/students/{id}', [StudentController::class, 'show'])
    ->name('students.show');

// Form sửa
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

// Xử lý cập nhật
Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

// Xóa
Route::delete('/students/{id}/delete', [StudentController::class, 'destroy'])
    ->name('students.destroy');
