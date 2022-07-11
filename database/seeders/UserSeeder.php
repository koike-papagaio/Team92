<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'テスト１',
            'address' => '東京都米花市米花町2丁目21番地',
            'email' => 'example1@gmail.com',
            'password' => Hash::make('pass'),
            'pay_limit' => '200000',
            'admin' => '1',
        ]);
        User::create([
            'name' => 'テスト２',
            'address' => '東京都米花市',
            'email' => 'example2@gmail.com',
            'password' => Hash::make('pass'),
            'pay_limit' => '999999999',
            'admin' => '0',
        ]);
        User::create([
            'name' => 'テスト３',
            'address' => '大阪府寝屋川市',
            'email' => 'example3@gmail.com',
            'password' => Hash::make('pass'),
            'pay_limit' => '190000',
            'admin' => '0',
        ]);
    }
}
