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
        // DB::table('colors')->truncate();

        $colors = [
            ['name' => 'red', 'hex' => '#FF3333'],
            ['name' => 'blue', 'hex' => '#4870FF'],
            ['name' => 'green', 'hex' => '#204012'],
            ['name' => 'white', 'hex' => '#ffffff'],
            ['name' => 'black', 'hex' => '#000000'],
            ['name' => 'pink', 'hex' => '#FF6BA9'],
            ['name' => 'brown', 'hex' => '#592F0A'],
            ['name' => 'orange', 'hex' => '#FF7A40'],
            ['name' => 'grey', 'hex' => '#CFCFCF'],
        ];
        DB::table('colors')->insert($colors);
    }
}
