<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('admin', \App\Http\Controllers\AdminController::class);
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class,'index' ])->name('admin.login');
Route::post('/admin/dashboard', [\App\Http\Controllers\AdminController::class,'dashboard' ])->name('admin.dashboard');
