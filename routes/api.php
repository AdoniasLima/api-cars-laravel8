<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;

//Brands
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::post('/add/brand', [BrandController::class, 'create']);
Route::put('/update/brand/{id}', [BrandController::class, 'update']);
Route::delete('/delete/brand/{id}', [BrandController::class, 'destroy']);

//Cars
Route::group(['prefix' => "cars"], function(){
    //Return only car list
    Route::get('/', [CarController::class, 'index']);
    //Return cars and brands
    Route::get('/all', [CarController::class, 'all']);
});
Route::get('/car/{id}', [CarController::class, 'show']);
Route::post('/add/car', [CarController::class, 'create']);
Route::put('/update/car/{id}', [CarController::class, 'update']);
Route::delete('/delete/car/{id}', [CarController::class, 'destroy']);