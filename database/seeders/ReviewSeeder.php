<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->truncate();

        $reviews = [
            [
                'product_id' => '1',
                'user_id' => '1',
                'rating' => '5',
                'comment' => 'Very good, very nice!',
            ],
            [
                'product_id' => '1',
                'user_id' => '1',
                'rating' => '5',
                'comment' => 'Indulge in the epitome of opulence with the Monarch Velvet Armchair, a masterpiece that blends timeless elegance with modern sophistication. Handcrafted from the finest materials, this chair features sumptuous velvet upholstery that invites you to sink into its plush depths. The meticulously carved wooden legs and gracefully curved arms showcase exceptional artistry, making it a stunning focal point in any room.',
            ],
            [
                'product_id' => '1',
                'user_id' => '1',
                'rating' => '5',
                'comment' => 'The meticulously carved wooden legs.',
            ]
        ];

        DB::table('reviews')->insert($reviews);
    }
}
