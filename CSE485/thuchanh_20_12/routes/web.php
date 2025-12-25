<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;

Route::get('/', [IssuesController::class, 'index']);

Route::get('/issues', [IssuesController::class, 'index'])->name('issues.index');

Route::post('/issues', [IssuesController::class, 'store'])->name('issues.store');
Route::get('/issues/create', [IssuesController::class, 'create'])->name('issues.create');

Route::put('/issues/{issue}', [IssuesController::class, 'update'])->name('issues.update');
Route::get('/issues/{issue}/edit', [IssuesController::class, 'edit'])->name('issues.edit');


// Route::delete('/issues/{id}', [IssuesController::class, 'destroy'])->name('issues.destroy');
