<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'quantity',
        'image',
        'category_id',


    ];
    public function order(){
        return $this->belongsToMany(Order::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class);

    }
    public function isfav(){
        return $this->favorites()->where("user_id",Auth::id())->exists();
    }
    public function orderdetail(){
        return $this->hasMany(OrderDetails::class);
    }
}
