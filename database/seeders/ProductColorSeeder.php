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
        // DB::table('product_colors')->truncate();

        $ProductColors = [
            // Zenith
            [
                "product_id" => "1",
                "color_id" => "1",
            ],
            [
                "product_id" => "1",
                "color_id" => "2",
            ],
            [
                "product_id" => "1",
                "color_id" => "3",
            ],
            [
                "product_id" => "1",
                "color_id" => "4",
            ],

            // Blossom
            [
                "product_id" => "2",
                "color_id" => "6",
            ],
            [
                "product_id" => "2",
                "color_id" => "3",
            ],
            [
                "product_id" => "2",
                "color_id" => "4",
            ],
            // Glacier
            [
                "product_id" => "3",
                "color_id" => "4",
            ],
            [
                "product_id" => "3",
                "color_id" => "7",
            ],
            [
                "product_id" => "3",
                "color_id" => "2",
            ],
            // Espresso
            [
                "product_id" => "4",
                "color_id" => "7",
            ],
            [
                "product_id" => "4",
                "color_id" => "4",
            ],
            [
                "product_id" => "4",
                "color_id" => "5",
            ],
            // Jade
            [
                "product_id" => "5",
                "color_id" => "3",
            ],
            [
                "product_id" => "5",
                "color_id" => "4",
            ],
            // Sunset
            [
                "product_id" => "6",
                "color_id" => "1",
            ],
            [
                "product_id" => "6",
                "color_id" => "8",
            ],
            // Emerald
            [
                "product_id" => "7",
                "color_id" => "3",
            ],
            [
                "product_id" => "7",
                "color_id" => "1",
            ],
            // Slate
            [
                "product_id" => "8",
                "color_id" => "9",
            ],
            [
                "product_id" => "8",
                "color_id" => "4",
            ],
            [
                "product_id" => "8",
                "color_id" => "5",
            ],
            // Ivory
            [
                "product_id" => "9",
                "color_id" => "4",
            ],
            [
                "product_id" => "9",
                "color_id" => "9",
            ],
            // Ivory
            [
                "product_id" => "10",
                "color_id" => "7",
            ],
            // Oakwood
            [
                "product_id" => "11",
                "color_id" => "7",
            ],
            // Timberwood
            [
                "product_id" => "12",
                "color_id" => "7",
            ],
            // Onyx
            [
                "product_id" => "13",
                "color_id" => "5",
            ],
            // Luna
            [
                "product_id" => "14",
                "color_id" => "4",
            ],
            [
                "product_id" => "14",
                "color_id" => "9",
            ],
            // Goth
            [
                "product_id" => "15",
                "color_id" => "5",
            ],
            [
                "product_id" => "15",
                "color_id" => "9",
            ],
            // Arctic
            [
                "product_id" => "16",
                "color_id" => "4",
            ],
            // Snow
            [
                "product_id" => "3",
                "color_id" => "1",
            ],
            // Charcoal
            [
                "product_id" => "18",
                "color_id" => "5",
            ],
            [
                "product_id" => "18",
                "color_id" => "9",
            ],
            // Midnight
            [
                "product_id" => "19",
                "color_id" => "5",
            ],
            // Silver Mist
            [
                "product_id" => "20",
                "color_id" => "9",
            ],
            [
                "product_id" => "20",
                "color_id" => "4",
            ],
            // Obsidian Noir
            [
                "product_id" => "21",
                "color_id" => "5",
            ],
            // Driftwood
            [
                "product_id" => "21",
                "color_id" => "7",
            ],
        ];

        DB::table('product_colors')->insert($ProductColors);
    }
}
