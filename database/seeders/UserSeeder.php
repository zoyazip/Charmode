<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;


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
            [
                'full_name' => 'Jesus',
                'email' => 'jesus@charmode.com',
                'phone' => '123456789',
                'password' => Hash::make('password'),

            ],
            [
                'full_name' => 'Adam',
                'email' => 'adam@charmode.com',
                'phone' => '223456789',
                'password' => Hash::make('password'),

            ],
        ];

        DB::table('users')->insert($users);
    }
}
