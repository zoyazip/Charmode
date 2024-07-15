<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->truncate();

        $products = [
            [
                'name' => 'Zenith',
                'description' => 'The Modern Zenith Chair is a sleek, stylish addition to any workspace.',
                'subcategoryID' =>  '1',
                'price' => '150',
                'discount' => '0',
                'stockQuantity' => '100',
                'specifications' => json_encode([
                    'width' => '61',
                    'height' => '102',
                    'depth' => '56',
                    'weight' => '2.5',
                    'material' => ['Faux leather', 'Steel frame'],
                    'year' => '2023',
                    'manufacturer' => 'Ergonomic Inc.',
                ]),
                'colorID' => json_encode(['1', '3', '4', '5']),
                // 'colorID' => null,
                'images' => json_encode(['chair_1.png']),
            ],
            [
                'name' => 'Blossom',
                'description' => 'The Blossom Executive Chair combines comfort and style, perfect for any modern office or home workspace.',
                'subcategoryID' =>  '1',
                'price' => '153',
                'discount' => '10',
                'stockQuantity' => '100',
                'specifications' => json_encode([
                    'width' => '63',
                    'height' => '105',
                    'depth' => '58',
                    'weight' => '2',
                    'material' => ['Leather', 'Metal frame'],
                    'year' => '2023',
                    'manufacturer' => 'Comfort Inc.',
                ]),
                'colorID' => json_encode(['1', '3', '4', '6']),
                // 'colorID' => null,
                'images' => json_encode(['chair_2.png']),
            ],
            [
                'name' => 'Glacier',
                'description' => 'The Glacier Ergonomic Chair is designed to enhance your comfort and productivity.',
                'subcategoryID' =>  '1',
                'price' => '200',
                'discount' => '0',
                'stockQuantity' => '100',
                'specifications' => json_encode([
                    'width' => '60',
                    'height' => '110',
                    'depth' => '57',
                    'weight' => '2.3',
                    'material' => ['Fabric', 'aluminum'],
                    'year' => '2023',
                    'manufacturer' => 'Elite Solutions Inc.',
                ]),
                'colorID' => json_encode(['1', '3', '4', '5']),
                // 'colorID' => null,
                'images' => json_encode(['chair_3.png']),
            ],
        ];
        DB::table('products')->insert($products);
    }
}
