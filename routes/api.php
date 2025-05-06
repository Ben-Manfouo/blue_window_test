<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('countries', [CountryController::class, "index"]);
Route::group(['prefix' => 'brands'], function (){
    Route::get('/', [BrandController::class, "index"]);
    Route::post('/', [BrandController::class, "store"]);
    Route::get('/{brand_id}', [BrandController::class, "show"]);
    Route::patch('/{brand_id}', [BrandController::class, "update"]);
    Route::delete('/{brand_id}', [BrandController::class, "destroy"]);
});
