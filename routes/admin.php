<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\tagcontroller;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
Route::resource('post',PostController::class);
Route::resource('tag', tagcontroller::class);