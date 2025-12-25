<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/employee');
});

Route::resource('employee', EmployeeController::class);