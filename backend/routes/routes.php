<?php

use App\Http\Controllers\UserController;
use Kernel\Router\Route;

$a = 10;

var_dump($a);

var_dump(++$a);
xdebug_info();
phpinfo();
Route::get('', [UserController::class, 'slash'])->name('test1');
Route::get('/new', [UserController::class, 'index'])->name('test1');
Route::post('/', [UserController::class, 'createNew'])->name('test1');
Route::post('/new', [UserController::class, 'create'])->name('test2');
Route::put('/', [UserController::class, 'update'])->name('test1');
Route::put('/new', [UserController::class, 'update'])->name('test2');
Route::delete('/new', [UserController::class, 'delete'])->name('test2');
