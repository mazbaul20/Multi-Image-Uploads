<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiImageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[MultiImageController::class, 'index'])->name('index.page');
Route::post('/store/multi/image', [MultiImageController::class, 'store'])->name('store.multi.image');
