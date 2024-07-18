<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = [
            ['user_id' => '1', 'totalCost' => '80', 'deliveryCost' => '5', 
            'email' => 'username@mail.com', 'city' => 'Riga', 'address' => 'Skolas iela 5', 'comment' => 'Comment 1', 
            'deliveryMethod' => 'Pasts', 'deliveryPlace' => 'Skolas iela 5, Riga', 'paymentMethod' => 'Card', 
            'status' => 'delivered'],
            ['user_id' => '1', 'totalCost' => '280', 'deliveryCost' => '15', 
            'email' => 'username@mail.com', 'city' => 'Riga', 'address' => 'Skolas iela 5', 'comment' => 'Comment 1', 
            'deliveryMethod' => 'Pasts', 'deliveryPlace' => 'Skolas iela 5, Riga', 'paymentMethod' => 'Card', 
            'status' => 'delivered'],
            ['user_id' => '1', 'totalCost' => '80', 'deliveryCost' => '5', 
            'email' => 'username@mail.com', 'city' => 'Riga', 'address' => 'Skolas iela 5', 'comment' => 'Comment 1', 
            'deliveryMethod' => 'Pasts', 'deliveryPlace' => 'Skolas iela 5, Riga', 'paymentMethod' => 'Card', 
            'status' => 'delivered'],
            ['user_id' => '1', 'totalCost' => '180', 'deliveryCost' => '5', 
            'email' => 'username@mail.com', 'city' => 'Riga', 'address' => 'Skolas iela 5', 'comment' => 'Comment 1', 
            'deliveryMethod' => 'Pasts', 'deliveryPlace' => 'Skolas iela 5, Riga', 'paymentMethod' => 'Card', 
            'status' => 'delivered'],
            ['user_id' => '1', 'totalCost' => '80', 'deliveryCost' => '5', 
            'email' => 'username@mail.com', 'city' => 'Riga', 'address' => 'Skolas iela 5', 'comment' => 'Comment 1', 
            'deliveryMethod' => 'Pasts', 'deliveryPlace' => 'Skolas iela 5, Riga', 'paymentMethod' => 'Cash', 
            'status' => 'shipped'],
        ];

        DB::table('orders')->insert($orders);
    }
}
