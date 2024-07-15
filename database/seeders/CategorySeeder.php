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
        DB::table('categories')->truncate();
        $categories = [
            ['name' => 'Bedroom'],
            ['name' => 'Kitchen & Appliances'],
            ['name' => 'Living room'],
            ['name' => 'Outdoor'],
            ['name' => 'Garage'],
            ['name' => 'Bath'],
            ['name' => 'Office & Office room'],
            ['name' => 'Dorm room'],
            ['name' => 'Kids room'],
            ['name' => 'Hallway'],
            ['name' => 'Laundry'],
            ['name' => 'Dining'],
        ];

        DB::table('categories')->insert($categories);
    }
}
