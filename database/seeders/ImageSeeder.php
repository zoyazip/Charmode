<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->truncate();

        $ProductColors = [
            // Zenith
            [
                "url" => "assets/webp/products/zenith/zenit_1.webp",
                "product_id" => "1",
            ],
            [
                "url" => "assets/webp/products/zenith/zenit_2.webp",
                "product_id" => "1",
            ],
            [
                "url" => "assets/webp/products/zenith/zenit_3.webp",
                "product_id" => "1",
            ],
            [
                "url" => "assets/webp/products/zenith/zenit_4.webp",
                "product_id" => "1",
            ],
            // Blossom
            [
                "url" => "assets/webp/products/blossom/blossom_1.webp",
                "product_id" => "2",
            ],
            [
                "url" => "assets/webp/products/blossom/blossom_2.webp",
                "product_id" => "2",
            ],
            [
                "url" => "assets/webp/products/blossom/blossom_3.webp",
                "product_id" => "2",
            ],
            [
                "url" => "assets/webp/products/blossom/blossom_4.webp",
                "product_id" => "2",
            ],
            // Glacier
            [
                "url" => "assets/webp/products/glacier/glacier_1.webp",
                "product_id" => "3",
            ],
            [
                "url" => "assets/webp/products/glacier/glacier_2.webp",
                "product_id" => "3",
            ],
            [
                "url" => "assets/webp/products/glacier/glacier_3.webp",
                "product_id" => "3",
            ],
            [
                "url" => "assets/webp/products/glacier/glacier_4.webp",
                "product_id" => "3",
            ],
            // Espresso
            [
                "url" => "assets/webp/products/espresso/espresso_1.webp",
                "product_id" => "4",
            ],
            [
                "url" => "assets/webp/products/espresso/espresso_2.webp",
                "product_id" => "4",
            ],
            [
                "url" => "assets/webp/products/espresso/espresso_3.webp",
                "product_id" => "4",
            ],
            [
                "url" => "assets/webp/products/espresso/espresso_4.webp",
                "product_id" => "4",
            ],
            // Jade
            [
                "url" => "assets/webp/products/jade/jade_1.webp",
                "product_id" => "5",
            ],
            [
                "url" => "assets/webp/products/jade/jade_2.webp",
                "product_id" => "5",
            ],
            [
                "url" => "assets/webp/products/jade/jade_3.webp",
                "product_id" => "5",
            ],
            [
                "url" => "assets/webp/products/jade/jade_4.webp",
                "product_id" => "5",
            ],
            // Sunset
            [
                "url" => "assets/webp/products/sunset/sunset_1.webp",
                "product_id" => "6",
            ],
            [
                "url" => "assets/webp/products/sunset/sunset_2.webp",
                "product_id" => "6",
            ],
            [
                "url" => "assets/webp/products/sunset/sunset_3.webp",
                "product_id" => "6",
            ],
            [
                "url" => "assets/webp/products/sunset/sunset_4.webp",
                "product_id" => "6",
            ],
            // Emerald
            [
                "url" => "assets/webp/products/emerald/emerald_1.webp",
                "product_id" => "7",
            ],
            [
                "url" => "assets/webp/products/emerald/emerald_2.webp",
                "product_id" => "7",
            ],
            [
                "url" => "assets/webp/products/emerald/emerald_3.webp",
                "product_id" => "7",
            ],
            [
                "url" => "assets/webp/products/emerald/emerald_4.webp",
                "product_id" => "7",
            ],
            // Slate
            [
                "url" => "assets/webp/products/slate/slate_1.webp",
                "product_id" => "8",
            ],
            [
                "url" => "assets/webp/products/slate/slate_2.webp",
                "product_id" => "8",
            ],
            [
                "url" => "assets/webp/products/slate/slate_3.webp",
                "product_id" => "8",
            ],
            [
                "url" => "assets/webp/products/slate/slate_4.webp",
                "product_id" => "8",
            ],
            // Ivory
            [
                "url" => "assets/webp/products/ivory/ivory_1.webp",
                "product_id" => "9",
            ],
            [
                "url" => "assets/webp/products/ivory/ivory_2.webp",
                "product_id" => "9",
            ],
            [
                "url" => "assets/webp/products/ivory/ivory_3.webp",
                "product_id" => "9",
            ],
            [
                "url" => "assets/webp/products/ivory/ivory_4.webp",
                "product_id" => "9",
            ],
            // Chestnut
            [
                "url" => "assets/webp/products/chestnut/chestnut_1.webp",
                "product_id" => "10",
            ],
            [
                "url" => "assets/webp/products/chestnut/chestnut_2.webp",
                "product_id" => "10",
            ],
            [
                "url" => "assets/webp/products/chestnut/chestnut_3.webp",
                "product_id" => "10",
            ],
            [
                "url" => "assets/webp/products/chestnut/chestnut_4.webp",
                "product_id" => "10",
            ],
            // Oakwood
            [
                "url" => "assets/webp/products/oakwood/oakwood_1.webp",
                "product_id" => "11",
            ],
            [
                "url" => "assets/webp/products/oakwood/oakwood_2.webp",
                "product_id" => "11",
            ],
            [
                "url" => "assets/webp/products/oakwood/oakwood_3.webp",
                "product_id" => "11",
            ],
            [
                "url" => "assets/webp/products/oakwood/oakwood_4.webp",
                "product_id" => "11",
            ],
            // Timberwood
            [
                "url" => "assets/webp/products/timberwood/timberwood_1.webp",
                "product_id" => "12",
            ],
            [
                "url" => "assets/webp/products/timberwood/timberwood_2.webp",
                "product_id" => "12",
            ],
            [
                "url" => "assets/webp/products/timberwood/timberwood_3.webp",
                "product_id" => "12",
            ],
            // Onyx
            [
                "url" => "assets/webp/products/onyx/onyx_1.webp",
                "product_id" => "13",
            ],
            [
                "url" => "assets/webp/products/onyx/onyx_2.webp",
                "product_id" => "13",
            ],
            [
                "url" => "assets/webp/products/onyx/onyx_3.webp",
                "product_id" => "13",
            ],
            // Luna
            [
                "url" => "assets/webp/products/luna/luna_1.webp",
                "product_id" => "14",
            ],
            [
                "url" => "assets/webp/products/luna/luna_2.webp",
                "product_id" => "14",
            ],
            // Goth
            [
                "url" => "assets/webp/products/goth/goth_1.webp",
                "product_id" => "15",
            ],
            [
                "url" => "assets/webp/products/goth/goth_2.webp",
                "product_id" => "15",
            ],
            [
                "url" => "assets/webp/products/goth/goth_3.webp",
                "product_id" => "15",
            ],
            [
                "url" => "assets/webp/products/goth/goth_4.webp",
                "product_id" => "15",
            ],
            // Arctic
            [
                "url" => "assets/webp/products/arctic/arctic_1.webp",
                "product_id" => "16",
            ],
            [
                "url" => "assets/webp/products/arctic/arctic_2.webp",
                "product_id" => "16",
            ],
            [
                "url" => "assets/webp/products/arctic/arctic_3.webp",
                "product_id" => "16",
            ],
            [
                "url" => "assets/webp/products/arctic/arctic_4.webp",
                "product_id" => "16",
            ],
            // Snow
            [
                "url" => "assets/webp/products/snow/snow_1.webp",
                "product_id" => "17",
            ],
            [
                "url" => "assets/webp/products/snow/snow_2.webp",
                "product_id" => "17",
            ],
            [
                "url" => "assets/webp/products/snow/snow_3.webp",
                "product_id" => "17",
            ],
            [
                "url" => "assets/webp/products/snow/snow_4.webp",
                "product_id" => "17",
            ],
            // Charcoal
            [
                "url" => "assets/webp/products/charcoal/charcoal_1.webp",
                "product_id" => "18",
            ],
            [
                "url" => "assets/webp/products/charcoal/charcoal_2.webp",
                "product_id" => "18",
            ],
            [
                "url" => "assets/webp/products/charcoal/charcoal_3.webp",
                "product_id" => "18",
            ],
            [
                "url" => "assets/webp/products/charcoal/charcoal_4.webp",
                "product_id" => "18",
            ],
            // Midnight
            [
                "url" => "assets/webp/products/midnight/midnight_1.webp",
                "product_id" => "19",
            ],
            [
                "url" => "assets/webp/products/midnight/midnight_2.webp",
                "product_id" => "19",
            ],
            // Silver Mist
            [
                "url" => "assets/webp/products/silvermist/silvermist_1.webp",
                "product_id" => "20",
            ],
            [
                "url" => "assets/webp/products/silvermist/silvermist_2.webp",
                "product_id" => "20",
            ],
            [
                "url" => "assets/webp/products/silvermist/silvermist_3.webp",
                "product_id" => "20",
            ],
            [
                "url" => "assets/webp/products/silvermist/silvermist_4.webp",
                "product_id" => "20",
            ],
            // Obsidian Noir
            [
                "url" => "assets/webp/products/obsidiannoir/obsidiannoir_1.webp",
                "product_id" => "21",
            ],
            [
                "url" => "assets/webp/products/obsidiannoir/obsidiannoir_2.webp",
                "product_id" => "21",
            ],
            [
                "url" => "assets/webp/products/obsidiannoir/obsidiannoir_3.webp",
                "product_id" => "21",
            ],
            [
                "url" => "assets/webp/products/obsidiannoir/obsidiannoir_4.webp",
                "product_id" => "21",
            ],
            // Driftwood
            [
                "url" => "assets/webp/products/driftwood/driftwood_1.webp",
                "product_id" => "22",
            ],
            [
                "url" => "assets/webp/products/driftwood/driftwood_2.webp",
                "product_id" => "22",
            ],
            [
                "url" => "assets/webp/products/driftwood/driftwood_3.webp",
                "product_id" => "22",
            ],
            [
                "url" => "assets/webp/products/driftwood/driftwood_4.webp",
                "product_id" => "22",
            ],

        ];

        DB::table('product_colors')->insert($ProductColors);
    }
}
