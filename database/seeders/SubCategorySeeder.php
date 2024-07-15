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
        //
        $subCategories = [
            ['name' => 'table', 'categoryID' => '1'],
            ['name' => 'chair', 'categoryID' => '1'],
            ['name' => 'sofa', 'categoryID' => '1'],
            ['name' => 'bed', 'categoryID' => '2'],
            ['name' => 'chair', 'categoryID' => '2'],
            ['name' => 'lamp', 'categoryID' => '2'],
            ['name' => 'cupboard', 'categoryID' => '2'],
        ];
        DB::table('sub_categories')->insert($subCategories);
    }
}
