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
        $colors = [
            ['name' => 'red', 'hex' => '#ff0000'],
            ['name' => 'blue', 'hex' => '#00ff00'],
            ['name' => 'green', 'hex' => '#0000ff'],
            ['name' => 'white', 'hex' => '#ffffff'],
            ['name' => 'black', 'hex' => '#000000'],
        ];
        DB::table('colors')->insert($colors);
    }
}
