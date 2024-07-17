<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->truncate();

        $users = [
            ['full_name' => 'Jesus',
            'email' => 'jesus@charmode.com',
            'phone' => '123456789',
            'password' => 'password'],
        ];

        DB::table('users')->insert($users);
    }
}
