<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name"=>"book1",
            "desc"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "price"=>50,
            "quantity"=>20,
            "image"=>"products/1.jpg",
            "category_id"=>1
        ]);
        Product::create([
            "name"=>"book2",
            "desc"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "price"=>170,
            "quantity"=>20,
            "image"=>"products/2.jpg",
            "category_id"=>2
        ]);
        Product::create([
            "name"=>"book3",
            "desc"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "price"=>110,
            "quantity"=>35,
            "image"=>"products/3.jpg",
            "category_id"=>3
        ]);
    }
}
