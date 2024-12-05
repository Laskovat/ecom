<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
 ])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get("redirect",[AuthController::class,"redirect"]);
Route::get('change/{lang}', function ($lang) {
    if($lang == "en"){
        session()->put("lang","en");
    }elseif($lang == "ar"){
        session()->put("lang","ar");
    }elseif($lang == "cz"){
        session()->put("lang","cz");
    }
    return redirect()->back();

});

Route::controller(ProductController::class)->group(function(){

    Route::middleware("IsAdmin")->group(function(){


        Route::get("products","all")->name("allproducts");
        Route::get("products/create","create")->name("createproduct");
        Route::post("products","store")->name("storeproduct");

        Route::delete("products/delete/{id}","delete")->name("deleteproduct");
        Route::get("products/edit/{id}","edit")->name("editproduct");
        Route::put("products/{id}","update")->name("updateproduct");
    });
});
Route::controller(OrderController::class)->group(function(){

    Route::middleware("IsAdmin")->group(function(){


        Route::get("orders","all")->name("allorders");
        Route::get("showorder/{id}","show")->name("showorder");

        Route::delete("orders/delete/{id}","delete")->name("deleteorder");

        Route::get("editorder1/{id}","edit1")->name("editorder1");
        Route::get("editorder2/{id}","edit2")->name("editorder2");
        // Route::put("products/{id}","update")->name("updateproduct");
    });
});

Route::controller(CategoryController::class)->group(function(){

    Route::middleware("IsAdmin")->group(function(){

        Route::get("categories","all")->name("allcat");
        Route::get("categories/create","create")->name("createcat");
        Route::post("categories","store")->name("storecat");
        Route::delete("categories/delete/{id}","delete")->name("deletecat");
        Route::get("categories/edit/{id}","edit")->name("editcat");
        Route::put("categories/{id}","update")->name("updatecat");



    });
});
Route::controller(UserController::class)->group(function(){
        Route::get("showall","all")->name("showall");
        Route::get("showone/{id}","show")->name("showone");
        Route::post("usersearch","search")->name("search");

        Route::post("addToWishList/{id}","addtowishlist")->name("addToWishList");
        Route::get("myWishList","mywishlist")->name("myWishList");

        Route::middleware("auth")->group(function(){

            Route::post("addToCart/{id}","addtocart")->name("addToCart");
            Route::get("myCart","mycart")->name("myCart");
            Route::post("makeOrder","makeorder")->name("makeOrder");
            Route::post("addToFav/{id}","addtofav")->name("addToFav");
        });

    });