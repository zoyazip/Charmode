<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('specifications')->truncate();

        $colors = [
            ['key' => 'width', 'value' => '61', 'product_id' => '1'],
            ['key' => 'height', 'value' => '102', 'product_id' => '1'],
            ['key' => 'depth', 'value' => '56', 'product_id' => '1'],
            ['key' => 'width', 'value' => '63', 'product_id' => '2'],
            ['key' => 'height', 'value' => '105', 'product_id' => '2'],
            ['key' => 'depth', 'value' => '58', 'product_id' => '2'],
        ];
        DB::table('specifications')->insert($colors);

    }
}
