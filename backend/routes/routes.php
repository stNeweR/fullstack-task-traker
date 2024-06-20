<?php

use App\Http\Controllers\UserController;
use Kernel\Router\Route;

Route::get('/', [UserController::class, 'test'])->name('test1');
Route::get('/new', [UserController::class, 'test2'])->name('test2');
