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
            [
                'user_id' => '1',
                'totalCost' => '80',
                'deliveryCost' => '5',
                'email' => 'username@mail.com',
                'city' => 'Riga',
                'address' => 'Skolas iela 5',
                'comment' => 'Comment 1',
                'deliveryMethod' => 'Pasts',
                'deliveryPlace' => 'Skolas iela 5, Riga',
                'paymentMethod' => 'Card',
                'status' => 'delivered',
                'trackingNumber' => '4392347'
            ],
            // [
            //     'user_id' => '1',
            //     'totalCost' => '280',
            //     'deliveryCost' => '15',
            //     'email' => 'username@mail.com',
            //     'city' => 'Riga',
            //     'address' => 'Skolas iela 5',
            //     'comment' => 'Comment 1',
            //     'deliveryMethod' => 'Pasts',
            //     'deliveryPlace' => 'Skolas iela 5, Riga',
            //     'paymentMethod' => 'Card',
            //     'status' => 'delivered',
            //     'trackingNumber' => '233425'
            // ],
            // [
            //     'user_id' => '1',
            //     'totalCost' => '80',
            //     'deliveryCost' => '5',
            //     'email' => 'username@mail.com',
            //     'city' => 'Riga',
            //     'address' => 'Skolas iela 5',
            //     'comment' => 'Comment 1',
            //     'deliveryMethod' => 'Pasts',
            //     'deliveryPlace' => 'Skolas iela 5, Riga',
            //     'paymentMethod' => 'Card',
            //     'status' => 'delivered',
            //     'trackingNumber' => '7612736'
            // ],
            // [
            //     'user_id' => '1',
            //     'totalCost' => '180',
            //     'deliveryCost' => '5',
            //     'email' => 'username@mail.com',
            //     'city' => 'Riga',
            //     'address' => 'Skolas iela 5',
            //     'comment' => 'Comment 1',
            //     'deliveryMethod' => 'Pasts',
            //     'deliveryPlace' => 'Skolas iela 5, Riga',
            //     'paymentMethod' => 'Card',
            //     'status' => 'delivered',
            //     'trackingNumber' => '823401'
            // ],
            // [
            //     'user_id' => '1',
            //     'totalCost' => '80',
            //     'deliveryCost' => '5',
            //     'email' => 'username@mail.com',
            //     'city' => 'Riga',
            //     'address' => 'Skolas iela 5',
            //     'comment' => 'Comment 1',
            //     'deliveryMethod' => 'Pasts',
            //     'deliveryPlace' => 'Skolas iela 5, Riga',
            //     'paymentMethod' => 'Cash',
            //     'status' => 'shipped',
            //     'trackingNumber' => '43254667'
            // ],
        ];

        DB::table('orders')->insert($orders);
    }
}
