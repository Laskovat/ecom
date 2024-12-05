<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'requiredDate',
        'orderDate',
        'user_id',
        'orderNum',
        'totalPrice',
        'deliveryFee',
        'tax',
        'subtotal',
        'statu_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function statu(){
        return $this->belongsTo(Statu::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    public function orderHistory(){
        return $this->hasOne(OrderHistory::class);
    }

    public function products(){
        return $this->hasmany(Product::class);
    }




}

