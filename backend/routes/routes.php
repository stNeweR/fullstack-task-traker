<?php

use App\Http\Controllers\UserController;
use Kernel\Router\Route;

Route::get('/new', [UserController::class, 'test'])->name('test1');
Route::get('/new/{new}', [UserController::class, 'test2'])->name('test2');
Route::post('/', [UserController::class, 'test'])->name('test1');
Route::post('/new', [UserController::class, 'test2'])->name('test2');
Route::put('/', [UserController::class, 'test'])->name('test1');
Route::delete('/new', [UserController::class, 'test2'])->name('test2');
