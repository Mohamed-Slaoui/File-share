<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FileController::class, 'index'])->name('home');


Route::prefix('file')->controller(FileController::class)->group(function(){
    Route::get("/","index")->name("home");
});