<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderHistory;
use App\Models\Product;
use App\Models\Statu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(){
        $orders = Order::paginate(3);
        return view('admin.orders',["orders"=>$orders]);
    }
    public function show($id){
        $order = Order::findorfail($id);
        $order_id = $order->id;
        $orderdetails = OrderDetails::where('order_id',$order_id)->get();
        $orderhistory = OrderHistory::where('order_id',$order_id)->get();



        return view('admin.showorder',["order"=>$order,"orderdetails"=>$orderdetails,"orderhistory"=>$orderhistory]);
    }



    public function edit1($id){
        $order = Order::findOrFail($id);
        $order->update([
            'statu_id'=>"1"
        ]);
        OrderHistory::create([
            'order_id'=>$order->id,
            "orderNum"=>$order->orderNum,
            "statu_id"=>"1",
            'updated_at'=>time(),

        ]);
        return redirect()->back();


    }
    public function edit2($id){
        $order = Order::findOrFail($id);
        $order->update([
            'statu_id'=>"2"
        ]);
        OrderHistory::create([
            'order_id'=>$order->id,
            "orderNum"=>$order->orderNum,
            "statu_id"=>"2",
            'updated_at'=>time(),

        ]);
        return redirect()->back();

    }
}
