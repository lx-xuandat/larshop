<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('order_details')->insert([
                'product_id' => rand(1, 150),
                'order_id' => rand(1, 20),
                'quantity' => rand(1, 20),
                'price' => rand(10000, 2000000),
            ]);
        }
    }
}
