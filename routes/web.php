<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('/',[DocumentController::class, 'index'])->name('home');


Route::prefix('doc')->controller(DocumentController::class)->group(function(){
    Route::get("/","index")->name("home");
    Route::get("/docForm",function(){
        $cats = Category::all();
        return view('docs.docForm', compact('cats'));
    })->name("docForm");

    Route::post('/upload','upload')->name('upload');

    Route::post('/download/{id}','download')->name('download');
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

