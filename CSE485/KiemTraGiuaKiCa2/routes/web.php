<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
Route::get('/', function () {
    return redirect()->route('rooms.index');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');

route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

route::get('rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');

route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');


