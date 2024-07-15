<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ProductColors')->truncate();

        $ProductColors = [
            [
                "productID" => "1",
                "colorID" => "1",
            ],
            [
                "productID" => "2",
                "colorID" => "2",
            ],
            [
                "productID" => "2",
                "colorID" => "3",
            ],
            [
                "productID" => "2",
                "colorID" => "4",
            ],
            [
                "productID" => "3",
                "colorID" => "1",
            ],
            [
                "productID" => "4",
                "colorID" => "1",
            ],
            [
                "productID" => "4",
                "colorID" => "1",
            ],
            [
                "productID" => "5",
                "colorID" => "1",
            ],
            [
                "productID" => "6",
                "colorID" => "1",
            ],
            [
                "productID" => "7",
                "colorID" => "1",
            ],
            [
                "productID" => "8",
                "colorID" => "1",
            ],
            [
                "productID" => "8",
                "colorID" => "3",
            ],
            [
                "productID" => "8",
                "colorID" => "5",
            ],
        ];

        DB::table('ProductColors')->insert($ProductColors);
    }
}
