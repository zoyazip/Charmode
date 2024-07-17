<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            ProductColorSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
            SpecificationSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
