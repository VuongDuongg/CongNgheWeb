<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicinesController;
Route::get('/', [MedicinesController::class, "index"]);
Route::get("posts", [MedicinesController::class, "index"]);