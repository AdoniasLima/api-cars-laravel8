<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;

//Brands
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::post('/add/brand', [BrandController::class, 'create']);
Route::put('/update/brand/{id}', [BrandController::class, 'update']);
Route::delete("/delete/brand/{id}", [BrandController::class, 'destroy']);

//Cars