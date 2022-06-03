<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'category_id' => '1',
            'name' => 'リンゴ',
            'price' => '100',
            'item_detail' => '真っ赤で甘いそのまま食べるのに向いているリンゴです',
            'sales_status' => '0',
        ]);
        Item::create([
            'category_id' => '2',
            'name' => 'ランニングシューズ',
            'price' => '4000',
            'item_detail' => 'アキレス俊足',
            'sales_status' => '0',
        ]);
        Item::create([
            'category_id' => '3',
            'name' => 'リクルートスーツ',
            'price' => '15000',
            'item_detail' => '就職面接用スーツ',
            'sales_status' => '0',
        ]);
    }
}
