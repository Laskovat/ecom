<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect(){

        if(Auth::user()->role == "admin"){
            $products = Product::paginate(6);


            return view('admin.home',["products"=>$products]);
        }else{
            $products = Product::orderby("created_at",'desc')->paginate(3);

            return view('user.home',["products"=>$products]);
        }

    }
}
