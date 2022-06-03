<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buy;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buy::create([
            'user_id' => '1',
            'user_name' => '江戸川 コナン',
            'address' => '東京都米花市米花町2丁目21番地',
            'email' => 'example1@gmail.com',
            'item_name' => 'リンゴ',
            'price' => '100',
            'quantity' => '4869',
            'payment' => '1',
            'bought_num' => '2022060001',
        ]);
        Buy::create([
            'user_id' => '2',
            'user_name' => '鈴木 園子',
            'address' => '東京都米花市',
            'email' => 'example2@gmail.com',
            'item_name' => 'リクルートスーツ',
            'price' => '15000',
            'quantity' => '10',
            'payment' => '2',
            'bought_num' => '2022060002',
        ]);
        Buy::create([
            'user_id' => '3',
            'user_name' => '服部 平次',
            'address' => '大阪府寝屋川市',
            'email' => 'example3@gmail.com',
            'item_name' => 'ランニングシューズ',
            'price' => '4000',
            'quantity' => '5',
            'payment' => '3',
            'bought_num' => '2022060003',
        ]);
    }
}
