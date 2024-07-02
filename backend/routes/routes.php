<?php

use App\Http\Controllers\UserController;
use Kernel\Router\Route;


Route::get('', [UserController::class, 'slash'])->name('test1');
Route::get('/new', [UserController::class, 'index'])->name('test1');
// Route::get('/new/{new}', [UserController::class, 'show'])->name('test2');
Route::post('/', [UserController::class, 'createNew'])->name('test1');
Route::post('/new', [UserController::class, 'create'])->name('test2');
Route::put('/', [UserController::class, 'update'])->name('test1');
Route::put('/new', [UserController::class, 'update'])->name('test2');
Route::delete('/new', [UserController::class, 'delete'])->name('test2');
