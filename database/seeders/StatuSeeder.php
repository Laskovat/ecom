<?php

namespace Database\Seeders;

use App\Models\Statu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statu::create([
            'state'=>"new"
        ]);
        Statu::create([
            'state'=>"shipping"
        ]);
        Statu::create([
            'state'=>"finished"
        ]);
       
    }
}
