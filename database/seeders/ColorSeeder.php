<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('colors')->truncate();

        $colors = [
            ['name' => 'red', 'hex' => '#ff0000'],
            ['name' => 'blue', 'hex' => '#00ff00'],
            ['name' => 'green', 'hex' => '#0000ff'],
            ['name' => 'white', 'hex' => '#ffffff'],
            ['name' => 'black', 'hex' => '#000000'],
            ['name' => 'pink', 'hex' => '#ffc0cb'],
            ['name' => 'brown', 'hex' => '#7c3f00'],
        ];
        DB::table('colors')->insert($colors);
    }
}
