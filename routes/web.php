<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/admin/login',[AdminLoginController::class, "login"])->name('admin.login');
    Route::post('/admin/submit',[AdminLoginController::class, "submit"])->name('admin.submit');
});