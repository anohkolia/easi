<?php

use App\Http\Controllers\Shop\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', [MainController::class, 'index']);
Route::get('/detailproduit', [MainController::class, 'detailproduit']);
