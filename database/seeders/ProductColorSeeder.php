<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_colors')->truncate();

        $ProductColors = [
            [
                "product_id" => "1",
                "color_id" => "1",
            ],
            [
                "product_id" => "2",
                "color_id" => "2",
            ],
            [
                "product_id" => "2",
                "color_id" => "3",
            ],
            [
                "product_id" => "2",
                "color_id" => "4",
            ],
            [
                "product_id" => "3",
                "color_id" => "1",
            ],
            [
                "product_id" => "4",
                "color_id" => "1",
            ],
            [
                "product_id" => "4",
                "color_id" => "1",
            ],
            [
                "product_id" => "5",
                "color_id" => "1",
            ],
            [
                "product_id" => "6",
                "color_id" => "1",
            ],
            [
                "product_id" => "7",
                "color_id" => "1",
            ],
            [
                "product_id" => "8",
                "color_id" => "1",
            ],
            [
                "product_id" => "8",
                "color_id" => "5",
            ],
        ];

        DB::table('product_colors')->insert($ProductColors);
    }
}
