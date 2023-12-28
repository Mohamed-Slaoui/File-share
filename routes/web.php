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

    Route::get('/edit/{id}','edit')->name('edit');

    Route::put('/update/{id}','update')->name('update');

    Route::delete('/delete/{id}','delete')->name('delete');

    Route::post('/download/{id}','download')->name('download');

    Route::get('/explore/{id}','explore')->name('explore');

    Route::get('/category/{id}','filterByCategory')->name('filterByCategory');
});




Route::prefix('user')->controller(UserController::class)->group(function(){

    // --=-------Authentification---------------------
    Route::get("/register",function(){
        return view('users.register');
    })->name("register");

    Route::get("/login",function(){
        return view('users.login');
    })->name("login");

    Route::post("/addUser","addUser")->name("addUser");
    Route::post("/logUser","logUser")->name("logUser");

    Route::get("/logout","logout")->name("logout");

    //------------------------Pages----------------------------------
    Route::middleware('auth')->group(function(){

        Route::get('/show','showUsers')->name("users");
        Route::get('/my-files/{id?}','myFiles')->name('myFiles');
        Route::get('/my-files','myFiles')->name('adminFiles');

        Route::delete('delete_user/{id}', 'deleteUser')->name('deleteUser');
    });


});

