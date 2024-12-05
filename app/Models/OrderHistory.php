<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = [
        'order_id',
        'orderNum',
        'statu_id',

    ];
    public function statu(){
        return $this->belongsTo(Statu::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);

    }
}
