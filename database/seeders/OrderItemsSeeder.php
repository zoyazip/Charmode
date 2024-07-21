<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->truncate();

        $orderItems = [
            [
                'order_id' => '1',
                'product_id' => '1',
                'color_id' => '1',
                'quantity'=> '1',
                'newPrice' => '123',
                'oldPrice' => '150',
            ],
            [
                'order_id' => '1',
                'product_id' => '2',
                'color_id' => '6',
                'quantity'=> '2',
                'newPrice' => '120',
                'oldPrice' => '200',
            ]
        ];

        DB::table('order_items')->insert($orderItems);
    }
}
