<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 23; $i++) {
            DB::table('stock')->insert([
                'productID' => $i,
                'stockquantity' => rand(10, 100), 
            ]);
        }
    }
}
