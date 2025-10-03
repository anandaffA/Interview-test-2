<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'index'])->name('posts.index');
Route::get('/add', [AppController::class, 'add'])->name('posts.add');
Route::get('/post/{id}', [AppController::class, 'show'])->name('posts.show');
Route::get('/edit/{id}', [AppController::class, 'edit'])->name('posts.edit');
Route::put('/update/{id}', [AppController::class, 'update'])->name('posts.update');
Route::delete('/delete/{id}', [AppController::class, 'delete'])->name('posts.delete');
Route::post('/create', [AppController::class, 'store'])->name('posts.store');