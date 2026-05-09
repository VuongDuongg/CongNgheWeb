<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

route::post('/students', [StudentController::class, 'store'])->name('students.store');

route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


