<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderHistory;
use App\Models\Product;
use App\Models\Statu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function all(){
        $products = Product::orderby("created_at",'desc')->paginate(3);
        return view('user.home',["products"=>$products]);
    }
    public function show($id){
        $product = Product::findorfail($id);
        return view('user.showone',["product"=>$product]);
    }
    public function search(Request $request ){
        $search = $request->search ;
        $products = Product::where("name","like","%$search%")->paginate(3);
        if($products){
            return view('user.home',["products"=>$products]);

        }else {
            session()->flash("error","product not found");
            return redirect(route("showall")) ;
        }


    }
    public function addtocart(Request $request , $id){
        $qty = $request->qty;
        $product = Product::findorfail($id);
        $cart = Session()->get('cart');
        if(! $cart){
            $cart=[
                $id=>[
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "image"=>$product->image,
                    "qty"=>$qty
                ]
                ];
            Session()->put("cart",$cart);
            return redirect()->back();

        }else{
            if(isset($cart[$id])){
                $cart[$id]['qty']+=$qty;
                Session()->put("cart",$cart);
                return redirect()->back();
            }

            $cart[$id]=[
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "image"=>$product->image,
                    "qty"=>$qty
                ];
            Session()->put("cart",$cart);
            return redirect()->back();


        }
    }
    public function mycart(){
        $cart = Session()->get("cart");
        return view('user.cart', compact("cart")) ;
    }
    public function makeorder(Request $request){
        $user_id = Auth::id();
        $cart = session()->get('cart');
        $totalPrice = 0 ;

        foreach ($cart as $id=>$product ) {
            $total= $product['price']*$product['qty'] ;
            $totalPrice += $total;
        }
        $deliveryfees=50;
        $tax = ($totalPrice+$deliveryfees)*0.13;
        $subtotal = $totalPrice + $deliveryfees + $tax;
        $orderNum = hexdec(uniqid());
        $order = Order::create([
            "requiredDate"=>$request->requiredDate,
            "user_id"=>$user_id,
            "statu_id"=>"1",
            "orderNum"=>$orderNum,
            "totalPrice"=>$totalPrice,
            "deliveryFee"=>$deliveryfees,
            "tax"=>$tax,
            "subtotal"=>$subtotal,


        ]);

        foreach ($cart as $id=>$product ) {


            OrderDetails::create([
                "order_id"=>$order->id,
                "product_id"=>$id,
                "quantityOrdered"=>$product['qty'],
                "unitPrice"=>$product['price'],
                "totalPrice"=>($product['qty']*$product['price']),
                "user_id"=>$user_id,


            ]);
        }

        OrderHistory::create([
            'order_id'=>$order->id,
            "orderNum"=>$orderNum,
            "statu_id"=>"1",
            'updated_at'=>time(),

        ]);
        session()->forget('cart');
        return redirect(route("showall")) ;

    }
    public function addtowishlist(Request $request , $id){
        $product = Product::findorfail($id);
        $wishlist = Session()->get('wishlist');
        if(! $wishlist){
            $wishlist=[
                $id=>[
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "image"=>$product->image,
                ]
                ];
            Session()->put("wishlist",$wishlist);
            return redirect()->back();
        }else{
            if(isset($wishlist[$id])){

                session()->forget("wishlist");
                return redirect()->back();
            }

            $wishlist[$id]=[
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "image"=>$product->image,
                ];
            Session()->put("wishlist",$wishlist);
            return redirect()->back();
                }
    }
    public function mywishlist(){
        $wishlist = Session()->get("wishlist");
        return view('user.wishlist', compact("wishlist")) ;
    }
    public function addtofav(Request $request , $id){
        $product = Product::findorfail($id);
        $user_id = Auth::id();
        $isfav = Favorite::where("user_id",$user_id)->where("product_id",$id)->first();
        if($isfav != null){
            $isfav->delete();
            return redirect()->back();
        }else{
            Favorite::create([
                "user_id"=>$user_id,
                "product_id"=>$id
            ]);
            return redirect()->back();

        }

    }
}
