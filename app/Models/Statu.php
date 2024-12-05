<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $fillable = [
        'order_id',
        'orderNum',
        'state',
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function orderhistory(){
        return $this->hasMany(OrderHistory::class);

    }
}
