<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FileController::class, 'index'])->name('home');


Route::prefix('file')->controller(FileController::class)->group(function(){
    Route::get("/","index")->name("home");
});

Route::prefix('user')->controller(UserController::class)->group(function(){

    Route::get("/register",function(){
        return view('users.register');
    })->name("register");

    Route::get("/login",function(){
        return view('users.login');
    })->name("login");

    Route::post("/addUser","addUser")->name("addUser");
    Route::post("/logUser","logUser")->name("logUser");

    Route::get("/logout","logout")->name("logout");
});

