<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('sub_categories')->truncate();

        $subCategories = [
            ['name' => 'table', 'category_id' => '1'],
            ['name' => 'chair', 'category_id' => '1'],
            ['name' => 'sofa', 'category_id' => '1'],
            ['name' => 'bed', 'category_id' => '2'],
            ['name' => 'chair', 'category_id' => '2'],
            ['name' => 'lamp', 'category_id' => '2'],
            ['name' => 'cupboard', 'category_id' => '3'],
            ['name' => 'bed', 'category_id' => '3'],
            ['name' => 'chair', 'category_id' => '4'],
            ['name' => 'lamp', 'category_id' => '4'],
            ['name' => 'cupboard', 'category_id' => '5'],
        ];
        DB::table('sub_categories')->insert($subCategories);
    }
}
