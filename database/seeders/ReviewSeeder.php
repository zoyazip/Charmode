<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $reviews = [
            ['product_id' => '3', 'user_id' => '1', 'rating' => '8', 'comment' => 'comment for product 1'],
            ['product_id' => '3', 'user_id' => '1', 'rating' => '8', 'comment' => 'comment for product 1'],
            ['product_id' => '3', 'user_id' => '1', 'rating' => '6', 'comment' => 'comment for product 1'],
            ['product_id' => '3', 'user_id' => '1', 'rating' => '8', 'comment' => 'comment 1'],
            ['product_id' => '3', 'user_id' => '1', 'rating' => '7', 'comment' => 'product 1'],
            ['product_id' => '3', 'user_id' => '1', 'rating' => '8', 'comment' => 'comment for product 1'],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
