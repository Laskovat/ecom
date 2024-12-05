<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "title"=>"web",
            "desc"=>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis veritatis hic ad"

        ]);
        Category::create([
            "title"=>"history",
            "desc"=>"Lorem 2, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis veritatis hic ad"

        ]);
        Category::create([
            "title"=>"language",
            "desc"=>"Lorem 3, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis veritatis hic ad"

        ]);
    }
}
