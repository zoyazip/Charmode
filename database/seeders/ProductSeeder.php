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
        DB::table('products')->truncate();

        $products = [
            [
                'name' => 'Zenith',
                'description' => 'The Modern Zenith Chair is a sleek, stylish addition to any workspace.',
                'subcategory_id' => '1',
                'oldPrice' => '150.99',
                'newPrice' => '150.99',
                'discount' => '0',
                'stockQuantity' => '100',
                'shippingCost' => '5.99',
                'product_code' => 'ihgwq21v',
            ],
            [
                'name' => 'Blossom',
                'description' => 'The Blossom Executive Chair combines comfort and style, perfect for any modern office or home workspace.',
                'subcategory_id' => '1',
                'oldPrice' => '180',
                'newPrice' => '153',
                'discount' => '15',
                'stockQuantity' => '100',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Glacier',
                'description' => 'The Glacier Ergonomic Chair is designed to enhance your comfort and productivity.',
                'subcategory_id' => '1',
                'oldPrice' => '200',
                'newPrice' => '200',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Espresso',
                'description' => 'The Espresso Executive Chair brings a touch of sophistication to any office setting. With its plush cushioning and high backrest, this chair ensures ultimate comfort. The rich brown faux leather finish exudes luxury, while the adjustable height and tilt features provide customizable support..',
                'subcategory_id' => '1',
                'oldPrice' => '220',
                'newPrice' => '200',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Jade',
                'description' => 'The Blossom Executive Chair combines comfort and style, perfect for any modern office or home workspace. It features a plush seat with thick padding, adjustable height, and a reclining backrest. The vibrant pink color adds a pop of personality, making it a standout piece.',
                'subcategory_id' => '1',
                'oldPrice' => '190',
                'newPrice' => '171',
                'discount' => '10',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Sunset',
                'description' => 'he Sunset Relax Sofa adds a vibrant and inviting touch to any living space. With its plush cushions and spacious seating, it offers ultimate comfort for lounging and relaxation. The bold orange color makes it a standout piece, perfect for modern and contemporary interiors .',
                'subcategory_id' => '1',
                'oldPrice' => '450',
                'newPrice' => '405',
                'discount' => '10',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Emerald',
                'description' => 'The Emerald Lux Sofa is a perfect blend of elegance and comfort. Its rich green color adds sophistication to any living space, while the deep seats and plush cushions ensure a cozy experience. Ideal for both modern and classic interiors, this sofa is a statement piece.',
                'subcategory_id' => '1',
                'oldPrice' => '480',
                'newPrice' => '422',
                'discount' => '12',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Slate',
                'description' => 'The Slate Comfort Sofa combines modern design with exceptional comfort. Its neutral grey color fits seamlessly into any décor, providing a sophisticated look. The sofa features deep seating and plush back cushions, making it perfect for relaxation and gatherings.',
                'subcategory_id' => '1',
                'oldPrice' => '500',
                'newPrice' => '500',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Ivory',
                'description' => 'The Ivory White Elegance Sofa embodies timeless sophistication and comfort. Its pristine white color complements any interior style, from classic to contemporary. The sofa features plush cushions, a sleek design, and sturdy construction, ensuring both aesthetic appeal and durability.',
                'subcategory_id' => '1',
                'oldPrice' => '600',
                'newPrice' => '600',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Chestnut',
                'description' => 'The Chestnut Brown Classic Sofa exudes warmth and elegance, making it a focal point in any living room. Its rich brown hue complements traditional and rustic interiors alike. This sofa features deep seating, plush cushions, and rolled arms, providing comfort and timeless style.',
                'subcategory_id' => '1',
                'oldPrice' => '550',
                'newPrice' => '495',
                'discount' => '10  ',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Slate',
                'description' => 'The Slate Comfort Sofa combines modern design with exceptional comfort. Its neutral grey color fits seamlessly into any décor, providing a sophisticated look. The sofa features deep seating and plush back cushions, making it perfect for relaxation and gatherings.',
                'subcategory_id' => '1',
                'oldPrice' => '500',
                'newPrice' => '500',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Timberwood',
                'description' => 'The Timberwood Rustic Dining Table exudes charm and craftsmanship, perfect for creating a cozy dining atmosphere. Crafted from reclaimed timber, each table showcases unique wood grain patterns and knots, adding character to your space. Its sturdy build and rustic finish make it ideal for family gatherings and meals.',
                'subcategory_id' => '1',
                'oldPrice' => '600',
                'newPrice' => '540',
                'discount' => '10',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
            [
                'name' => 'Slate',
                'description' => "The Onyx Black Modern Dining Table is a sleek and sophisticated addition to any dining room. Its minimalist design features a glossy black finish that adds a touch of elegance to your space. The table's sturdy construction and spacious surface make it perfect for hosting dinners and gatherings.",
                'subcategory_id' => '1',
                'oldPrice' => '700',
                'newPrice' => '700',
                'discount' => '0',
                'stockQuantity' => '150',
                'shippingCost' => '5.99',
                'product_code' => '238jhwef',
            ],
        ];
        DB::table('products')->insert($products);
    }
}
