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
        // DB::table('specifications')->truncate();

        $specifications = [
            // Zenith
            ['key' => 'width', 'value' => '61', 'product_id' => '1'],
            ['key' => 'height', 'value' => '102', 'product_id' => '1'],
            ['key' => 'depth', 'value' => '56', 'product_id' => '1'],
            ['key' => 'weight', 'value' => '2.5', 'product_id' => '1'],
            ['key' => 'material', 'value' => 'Faux Leather, Steel', 'product_id' => '1'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '1'],
            ['key' => 'year', 'value' => 'Ergonomic Inc.', 'product_id' => '1'],
            // Blossom
            ['key' => 'width', 'value' => '63', 'product_id' => '2'],
            ['key' => 'height', 'value' => '105', 'product_id' => '2'],
            ['key' => 'depth', 'value' => '58', 'product_id' => '2'],
            ['key' => 'weight', 'value' => '2', 'product_id' => '2'],
            ['key' => 'material', 'value' => 'Leather, Metal', 'product_id' => '2'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '2'],
            ['key' => 'year', 'value' => 'Comfort ', 'product_id' => '2'],
            // Glacier
            ['key' => 'width', 'value' => '60', 'product_id' => '3'],
            ['key' => 'height', 'value' => '105', 'product_id' => '3'],
            ['key' => 'depth', 'value' => '57', 'product_id' => '3'],
            ['key' => 'weight', 'value' => '2.3', 'product_id' => '3'],
            ['key' => 'material', 'value' => 'Fabric, Aluminum ', 'product_id' => '3'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '3'],
            ['key' => 'year', 'value' => 'Elite Solutions', 'product_id' => '3'],
            // Espresso
            ['key' => 'width', 'value' => '65', 'product_id' => '4'],
            ['key' => 'height', 'value' => '115', 'product_id' => '4'],
            ['key' => 'depth', 'value' => '60', 'product_id' => '4'],
            ['key' => 'weight', 'value' => '2.3', 'product_id' => '4'],
            ['key' => 'material', 'value' => 'Faux Leather, Wood', 'product_id' => '4'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '4'],
            ['key' => 'year', 'value' => 'LuxWork', 'product_id' => '4'],
            // Jade
            ['key' => 'width', 'value' => '62', 'product_id' => '5'],
            ['key' => 'height', 'value' => '108', 'product_id' => '5'],
            ['key' => 'depth', 'value' => '59', 'product_id' => '5'],
            ['key' => 'weight', 'value' => '2.3', 'product_id' => '5'],
            ['key' => 'material', 'value' => 'Soft Fabric, Steel', 'product_id' => '5'],
            ['key' => 'year', 'value' => '2022', 'product_id' => '5'],
            ['key' => 'year', 'value' => 'GreenLiving', 'product_id' => '5'],
            // Sunset
            ['key' => 'width', 'value' => '200', 'product_id' => '6'],
            ['key' => 'height', 'value' => '85', 'product_id' => '6'],
            ['key' => 'depth', 'value' => '90', 'product_id' => '6'],
            ['key' => 'weight', 'value' => '30', 'product_id' => '6'],
            ['key' => 'material', 'value' => 'Faux Leather, Wood', 'product_id' => '6'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '6'],
            ['key' => 'year', 'value' => 'CozyHome', 'product_id' => '6'],
            // Emerald
            ['key' => 'width', 'value' => '210', 'product_id' => '7'],
            ['key' => 'height', 'value' => '88', 'product_id' => '7'],
            ['key' => 'depth', 'value' => '95', 'product_id' => '7'],
            ['key' => 'weight', 'value' => '45', 'product_id' => '7'],
            ['key' => 'material', 'value' => 'Velvet, Wood', 'product_id' => '7'],
            ['key' => 'year', 'value' => '2020', 'product_id' => '7'],
            ['key' => 'year', 'value' => 'Elegant', 'product_id' => '7'],
            // Slate
            ['key' => 'width', 'value' => '220', 'product_id' => '8'],
            ['key' => 'height', 'value' => '90', 'product_id' => '8'],
            ['key' => 'depth', 'value' => '100', 'product_id' => '8'],
            ['key' => 'weight', 'value' => '50', 'product_id' => '8'],
            ['key' => 'material', 'value' => 'Linen Fabric, Wood', 'product_id' => '8'],
            ['key' => 'year', 'value' => '2024', 'product_id' => '8'],
            ['key' => 'year', 'value' => 'Moderns', 'product_id' => '8'],
            // Ivory
            ['key' => 'width', 'value' => '230', 'product_id' => '9'],
            ['key' => 'height', 'value' => '85', 'product_id' => '9'],
            ['key' => 'depth', 'value' => '95', 'product_id' => '9'],
            ['key' => 'weight', 'value' => '55', 'product_id' => '9'],
            ['key' => 'material', 'value' => 'Linen Fabric, Wood', 'product_id' => '9'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '9'],
            ['key' => 'year', 'value' => 'Luxe', 'product_id' => '9'],
            // Chestnut
            ['key' => 'width', 'value' => '220', 'product_id' => '10'],
            ['key' => 'height', 'value' => '95', 'product_id' => '10'],
            ['key' => 'depth', 'value' => '100', 'product_id' => '10'],
            ['key' => 'weight', 'value' => '60', 'product_id' => '10'],
            ['key' => 'material', 'value' => 'Leather, Wood', 'product_id' => '10'],
            ['key' => 'year', 'value' => '2019', 'product_id' => '10'],
            ['key' => 'year', 'value' => 'Heritage', 'product_id' => '10'],
            // Oakwood
            ['key' => 'width', 'value' => '180', 'product_id' => '11'],
            ['key' => 'height', 'value' => '76', 'product_id' => '11'],
            ['key' => 'depth', 'value' => '90', 'product_id' => '11'],
            ['key' => 'weight', 'value' => '40', 'product_id' => '11'],
            ['key' => 'material', 'value' => 'Oak, Steel', 'product_id' => '11'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '11'],
            ['key' => 'year', 'value' => 'Rustic Charm', 'product_id' => '11'],
            // Timberwood
            ['key' => 'width', 'value' => '200', 'product_id' => '12'],
            ['key' => 'height', 'value' => '76', 'product_id' => '12'],
            ['key' => 'depth', 'value' => '90', 'product_id' => '12'],
            ['key' => 'weight', 'value' => '50', 'product_id' => '12'],
            ['key' => 'material', 'value' => 'Reclaimed wood', 'product_id' => '12'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '12'],
            ['key' => 'year', 'value' => 'EcoWood', 'product_id' => '12'],
            // Onyx
            ['key' => 'width', 'value' => '180', 'product_id' => '13'],
            ['key' => 'height', 'value' => '75', 'product_id' => '13'],
            ['key' => 'depth', 'value' => '90', 'product_id' => '13'],
            ['key' => 'weight', 'value' => '35', 'product_id' => '13'],
            ['key' => 'material', 'value' => 'MDF', 'product_id' => '13'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '13'],
            ['key' => 'year', 'value' => 'Edge Designs', 'product_id' => '13'],
            // Luna
            ['key' => 'width', 'value' => '120', 'product_id' => '14'],
            ['key' => 'height', 'value' => '75', 'product_id' => '14'],
            ['key' => 'depth', 'value' => '120', 'product_id' => '14'],
            ['key' => 'weight', 'value' => '30', 'product_id' => '14'],
            ['key' => 'material', 'value' => 'MDF', 'product_id' => '14'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '14'],
            ['key' => 'year', 'value' => 'Elegant', 'product_id' => '14'],
            // Goth
            ['key' => 'width', 'value' => '160', 'product_id' => '15'],
            ['key' => 'height', 'value' => '100', 'product_id' => '15'],
            ['key' => 'depth', 'value' => '200', 'product_id' => '15'],
            ['key' => 'weight', 'value' => '50', 'product_id' => '15'],
            ['key' => 'material', 'value' => 'Steel', 'product_id' => '15'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '15'],
            ['key' => 'year', 'value' => 'Modern', 'product_id' => '15'],
            // Arctic
            ['key' => 'width', 'value' => '160', 'product_id' => '16'],
            ['key' => 'height', 'value' => '90', 'product_id' => '16'],
            ['key' => 'depth', 'value' => '200', 'product_id' => '16'],
            ['key' => 'weight', 'value' => '60', 'product_id' => '16'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '16'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '16'],
            ['key' => 'year', 'value' => 'Luxe', 'product_id' => '16'],
            // Snow
            ['key' => 'width', 'value' => '160', 'product_id' => '17'],
            ['key' => 'height', 'value' => '100', 'product_id' => '17'],
            ['key' => 'depth', 'value' => '200', 'product_id' => '17'],
            ['key' => 'weight', 'value' => '50', 'product_id' => '17'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '17'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '17'],
            ['key' => 'year', 'value' => 'Furnishings', 'product_id' => '17'],
            // Charcoal
            ['key' => 'width', 'value' => '160', 'product_id' => '18'],
            ['key' => 'height', 'value' => '120', 'product_id' => '18'],
            ['key' => 'depth', 'value' => '210', 'product_id' => '18'],
            ['key' => 'weight', 'value' => '55', 'product_id' => '18'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '18'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '18'],
            ['key' => 'year', 'value' => 'ChicHome', 'product_id' => '18'],
            // Midnight
            ['key' => 'width', 'value' => '120', 'product_id' => '19'],
            ['key' => 'height', 'value' => '90', 'product_id' => '19'],
            ['key' => 'depth', 'value' => '45', 'product_id' => '19'],
            ['key' => 'weight', 'value' => '40', 'product_id' => '19'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '19'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '19'],
            ['key' => 'year', 'value' => 'Elegance', 'product_id' => '19'],
            // Silver Mist
            ['key' => 'width', 'value' => '140', 'product_id' => '20'],
            ['key' => 'height', 'value' => '100', 'product_id' => '20'],
            ['key' => 'depth', 'value' => '50', 'product_id' => '20'],
            ['key' => 'weight', 'value' => '45', 'product_id' => '20'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '20'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '20'],
            ['key' => 'year', 'value' => 'Modern Designs', 'product_id' => '20'],
            // Obsidian Noir
            ['key' => 'width', 'value' => '160', 'product_id' => '21'],
            ['key' => 'height', 'value' => '90', 'product_id' => '21'],
            ['key' => 'depth', 'value' => '50', 'product_id' => '21'],
            ['key' => 'weight', 'value' => '55', 'product_id' => '21'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '21'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '21'],
            ['key' => 'year', 'value' => 'Furnishings', 'product_id' => '21'],
            // Driftwood
            ['key' => 'width', 'value' => '150', 'product_id' => '22'],
            ['key' => 'height', 'value' => '100', 'product_id' => '22'],
            ['key' => 'depth', 'value' => '45', 'product_id' => '22'],
            ['key' => 'weight', 'value' => '50', 'product_id' => '22'],
            ['key' => 'material', 'value' => 'Oak', 'product_id' => '22'],
            ['key' => 'year', 'value' => '2023', 'product_id' => '22'],
            ['key' => 'year', 'value' => 'Coastal', 'product_id' => '22'],
        ];

        DB::table('specifications')->insert($specifications);

    }
}
