<?php

use App\Http\Controllers\PostController; //load controller post

// baris kode lain
Route::get('/', function () {
    return view('welcome');
});
Route::resource('post', PostController::class);