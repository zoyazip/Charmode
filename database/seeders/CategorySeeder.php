<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'bedroom', 'sub_category' => 'chair'],
            ['name' => 'bedroom', 'sub_category' => 'bed'],
            ['name' => 'bedroom', 'sub_category' => 'cupboard'],
            ['name' => 'kitchen', 'sub_category' => 'table'],
            ['name' => 'kitchen', 'sub_category' => 'chair'],
            ['name' => 'living_room', 'sub_category' => 'chair'],
            ['name' => 'living_room', 'sub_category' => 'sofa'],
            ['name' => 'living_room', 'sub_category' => 'table'],
            ['name' => 'living_room', 'sub_category' => 'cupboard'],
            ['name' => 'bath_room', 'sub_category' => 'cupboard'],
        ];
        DB::table('categories')->insert($categories);
    }
}
