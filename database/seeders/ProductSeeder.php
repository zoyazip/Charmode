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
                'product_code'=>'MWO-12345',
                'name' => 'Zenith',
                'description' => 'The Modern Zenith Chair is a sleek, stylish addition to any workspace. With its ergonomic design, this chair provides maximum comfort for long hours of work. The chair features adjustable height, a tilting backrest, and sturdy armrests. Its clean white finish adds a touch of elegance and professionalism to your office.',
                'subcategory_id' =>  '2',
                'oldPrice' => '150',
                'newPrice' => '150',
                'discount' => '0',
                'stockQuantity' => '100',
                'shippingCost' => '0'
            ],
            [
                'product_code'=>'BPE-67890',
                'name' => 'Blossom',
                'description' => 'The Blossom Executive Chair combines comfort and style, perfect for any modern office or home workspace. It features a plush seat with thick padding, adjustable height, and a reclining backrest. The vibrant pink color adds a pop of personality, making it a standout piece.',
                'subcategory_id' =>  '2',
                'oldPrice' => '180',
                'newPrice' => '153',
                'discount' => '15',
                'stockQuantity' => '25',
                'shippingCost' => '4.50'
            ],
            [
                'product_code'=>'GWE-54321',
                'name' => 'Glacier',
                'description' => 'The Glacier Ergonomic Chair is designed to enhance your comfort and productivity. Its contoured seat and backrest provide excellent lumbar support, while the breathable mesh material keeps you cool throughout the day. The chair features adjustable armrests, height, and a tilt mechanism for personalized seating.',
                'subcategory_id' =>  '2',
                'oldPrice' => '200',
                'newPrice' => '200',
                'discount' => '0',
                'stockQuantity' => '36',
                'shippingCost' => '4.50'
            ],
            [
                'product_code'=>'EBE-11223',
                'name' => 'Espresso',
                'description' => 'The Espresso Executive Chair brings a touch of sophistication to any office setting. With its plush cushioning and high backrest, this chair ensures ultimate comfort. The rich brown faux leather finish exudes luxury, while the adjustable height and tilt features provide customizable support.',
                'subcategory_id' =>  '2',
                'oldPrice' => '220',
                'newPrice' => '220',
                'discount' => '0',
                'stockQuantity' => '21',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'JGC-33456',
                'name' => 'Jade',
                'description' => 'The Jade Comfort Chair is a perfect blend of style and ergonomics, ideal for both home and office use. Its vibrant green color adds a fresh touch to any space, while the contoured design ensures excellent support. Features include adjustable height, a reclining backrest, and cushioned armrests for maximum comfort.',
                'subcategory_id' =>  '2',
                'oldPrice' => '190',
                'newPrice' => '171',
                'discount' => '10',
                'stockQuantity' => '44',
                'shippingCost' => '0'
            ],
            [
                'product_code'=>'SOR-77889',
                'name' => 'Sunset',
                'description' => 'The Sunset Relax Sofa adds a vibrant and inviting touch to any living space. With its plush cushions and spacious seating, it offers ultimate comfort for lounging and relaxation. The bold orange color makes it a standout piece, perfect for modern and contemporary interiors.',
                'subcategory_id' =>  '3',
                'oldPrice' => '450',
                'newPrice' => '405',
                'discount' => '10',
                'stockQuantity' => '12',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'EGL-99231',
                'name' => 'Emerald',
                'description' => 'The Emerald Lux Sofa is a perfect blend of elegance and comfort. Its rich green color adds sophistication to any living space, while the deep seats and plush cushions ensure a cozy experience. Ideal for both modern and classic interiors, this sofa is a statement piece.',
                'subcategory_id' =>  '3',
                'oldPrice' => '480',
                'newPrice' => '422',
                'discount' => '12',
                'stockQuantity' => '3',
                'shippingCost' => '0'
            ],
            [
                'product_code'=>'SGC-44567',
                'name' => 'Slate',
                'description' => 'The Slate Comfort Sofa combines modern design with exceptional comfort. Its neutral grey color fits seamlessly into any décor, providing a sophisticated look. The sofa features deep seating and plush back cushions, making it perfect for relaxation and gatherings.',
                'subcategory_id' =>  '3',
                'oldPrice' => '500',
                'newPrice' => '500',
                'discount' => '0',
                'stockQuantity' => '56',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'IWE-56789',
                'name' => 'Ivory',
                'description' => 'The Ivory White Elegance Sofa embodies timeless sophistication and comfort. Its pristine white color complements any interior style, from classic to contemporary. The sofa features plush cushions, a sleek design, and sturdy construction, ensuring both aesthetic appeal and durability.',
                'subcategory_id' =>  '3',
                'oldPrice' => '600',
                'newPrice' => '600',
                'discount' => '0',
                'stockQuantity' => '27',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'CBC-12345',
                'name' => 'Chestnut',
                'description' => 'The Chestnut Brown Classic Sofa exudes warmth and elegance, making it a focal point in any living room. Its rich brown hue complements traditional and rustic interiors alike. This sofa features deep seating, plush cushions, and rolled arms, providing comfort and timeless style.',
                'subcategory_id' =>  '3',
                'oldPrice' => '550',
                'newPrice' => '495',
                'discount' => '10',
                'stockQuantity' => '12',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'OCDT-98765',
                'name' => 'Oakwood',
                'description' => 'The Oakwood Classic Dining Table embodies timeless beauty and durability. Crafted from solid oak, this table features a natural wood grain finish that adds warmth to any dining room. Its sturdy construction and simple design make it suitable for both everyday meals and special occasions.',
                'subcategory_id' =>  '1',
                'oldPrice' => '800',
                'newPrice' => '800',
                'discount' => '0',
                'stockQuantity' => '43',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'TRDT-45678',
                'name' => 'Timberwood',
                'description' => 'The Timberwood Rustic Dining Table exudes charm and craftsmanship, perfect for creating a cozy dining atmosphere. Crafted from reclaimed timber, each table showcases unique wood grain patterns and knots, adding character to your space. Its sturdy build and rustic finish make it ideal for family gatherings and meals.',
                'subcategory_id' =>  '1',
                'oldPrice' => '600',
                'newPrice' => '540',
                'discount' => '10',
                'stockQuantity' => '11',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'OBMT-78901',
                'name' => 'Onyx',
                'description' => 'The Onyx Black Modern Dining Table is a sleek and sophisticated addition to any dining room. Its minimalist design features a glossy black finish that adds a touch of elegance to your space. The tables sturdy construction and spacious surface make it perfect for hosting dinners and gatherings.',
                'subcategory_id' =>  '1',
                'oldPrice' => '700',
                'newPrice' => '700',
                'discount' => '0',
                'stockQuantity' => '7',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'LRDT-23456',
                'name' => 'Luna',
                'description' => 'The Luna White Round Dining Table combines modern style with functionality. Its sleek design and glossy white finish create a fresh and contemporary look in any dining area. The round shape promotes easy conversation and enhances the flow of the room, making it ideal for intimate gatherings.',
                'subcategory_id' =>  '1',
                'oldPrice' => '550',
                'newPrice' => '495',
                'discount' => '10',
                'stockQuantity' => '53',
                'shippingCost' => '4'
            ],
            [
                'product_code'=>'SFB-78912',
                'name' => 'Goth',
                'description' => 'The Steel Frame Modern Bed blends durability with contemporary design. Featuring a sleek black finish and minimalist lines, this bed frame adds a touch of sophistication to your bedroom. The sturdy steel construction ensures long-lasting support and stability, while the minimalist design complements various bedroom decor styles.',
                'subcategory_id' =>  '8',
                'oldPrice' => '900',
                'newPrice' => '900',
                'discount' => '0',
                'stockQuantity' => '3',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'AWPB-56789',
                'name' => 'Arctic',
                'description' => 'The Arctic White Platform Bed combines sleek modern aesthetics with practicality. Its clean lines and glossy white finish bring a sense of lightness and elegance to your bedroom. The platform design eliminates the need for a box spring, providing a minimalist look and ample under-bed storage space. Crafted from durable materials, this bed ensures both style and functionality.',
                'subcategory_id' =>  '8',
                'oldPrice' => '950',
                'newPrice' => '807',
                'discount' => '15',
                'stockQuantity' => '18',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'SWMB-12345',
                'name' => 'Snow',
                'description' => 'The Snow White Modern Bed combines simplicity with elegance, making it a perfect centerpiece for any contemporary bedroom. Its sleek, white lacquered finish exudes a clean and sophisticated vibe. The bed features a low-profile platform design, offering both style and comfort. Crafted from high-quality materials, it ensures durability and stability for a restful nights sleep.',
                'subcategory_id' =>  '8',
                'oldPrice' => '700',
                'newPrice' => '700',
                'discount' => '0',
                'stockQuantity' => '10',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'SGUB-67890',
                'name' => 'Charcoal',
                'description' => 'The Slate Grey Upholstered Bed combines contemporary style with comfort. Upholstered in a sophisticated grey fabric, this bed adds a touch of luxury to your bedroom. The tall, padded headboard provides excellent support for reading or watching TV in bed. The sturdy frame and elegant design make it a perfect choice for a modern bedroom setting.',
                'subcategory_id' =>  '8',
                'oldPrice' => '850',
                'newPrice' => '850',
                'discount' => '0',
                'stockQuantity' => '54',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'MED-45678',
                'name' => 'Midnight',
                'description' => 'The Midnight Ebony Dresser combines sleek modern design with ample storage space. Its deep black finish adds a touch of sophistication to any bedroom. The dresser features multiple drawers with smooth gliding mechanisms, perfect for organizing clothes and accessories. Its minimalist yet stylish appearance complements various bedroom decor styles.',
                'subcategory_id' =>  '7',
                'oldPrice' => '600',
                'newPrice' => '600',
                'discount' => '0',
                'stockQuantity' => '14',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'SCD-78901',
                'name' => 'Silver Mist',
                'description' => 'The Silver Mist Contemporary Dresser offers a blend of modern style and functionality. Its cool grey finish complements any bedroom decor, providing a versatile storage solution. This dresser features spacious drawers with sleek metal handles, offering ample space for clothes, linens, and more. The clean lines and minimalist design enhance the aesthetic appeal of your bedroom.',
                'subcategory_id' =>  '7',
                'oldPrice' => '650',
                'newPrice' => '650',
                'discount' => '0',
                'stockQuantity' => '34',
                'shippingCost' => '3.95'
            ],
            [
                'product_code'=>'OND-56789',
                'name' => 'Obsidian Noir',
                'description' => 'The Obsidian Noir Dresser combines bold aesthetics with practical storage solutions. Its deep black finish adds a touch of sophistication to any bedroom decor. The dresser features spacious drawers with sleek metal handles, providing ample space for organizing clothes, accessories, and other essentials. Its sturdy construction and contemporary design make it a standout piece in your bedroom.',
                'subcategory_id' =>  '7',
                'oldPrice' => '700',
                'newPrice' => '700',
                'discount' => '0',
                'stockQuantity' => '63',
                'shippingCost' => '0'
            ],
            [
                'product_code'=>'DSD-78910',
                'name' => 'Driftwood',
                'description' => 'The Driftwood Striped Dresser combines rustic charm with a touch of coastal elegance. Its natural wood finish with white painted stripes evokes a sense of beachside relaxation. The dresser features spacious drawers with antique brass handles, offering plenty of storage for clothes, linens, and personal items. This piece adds character and warmth to any bedroom decor.',
                'subcategory_id' =>  '7',
                'oldPrice' => '680',
                'newPrice' => '612',
                'discount' => '10',
                'stockQuantity' => '13',
                'shippingCost' => '4'
            ],
        ];
        DB::table('products')->insert($products);
    }
}
