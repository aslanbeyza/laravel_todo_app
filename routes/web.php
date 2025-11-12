<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
//CategoryController classına git index fonksiyonunu çalıştır.
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');