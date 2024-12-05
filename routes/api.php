<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function(){
    Route::get("products","all")->name("allproducts");

    Route::post("products","store")->name("storeproduct");

    Route::put("products/{id}","update")->name("updateproduct");

    Route::delete("products/delete/{id}","delete")->name("deleteproduct");
});
Route::controller(ApiAuthController::class)->group(function(){

    Route::middleware("ApiAuth")->group(function(){

        // Route::post("register","register")->name("register");

        // Route::post("login","login")->name("login");

        // Route::post("logout","logout")->name("logout");
    });

});