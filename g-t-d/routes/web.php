<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [TodoController::class, 'index'])->name('index');

Route::post('/storeItemRoute', [TodoController::class, 'storeItem'])->name('storeItem');

Route::post('/markCompleteRoute/{id}', [TodoController::class, 'markComplete'])->name('markComplete');

