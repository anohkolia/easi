<?php

use App\Http\Controllers\Shop\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index']);

Route::get ('/detailproduit', [MainController::class, 'detailproduit']);
