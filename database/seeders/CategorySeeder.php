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
        DB::table('categories')->truncate();
        $categories = [
            ['name' => 'bedroom'],
            ['name' => 'kitchen'],
            ['name' => 'living_room'],
            ['name' => 'bath_room'],
        ];
        DB::table('categories')->insert($categories);
    }
}
