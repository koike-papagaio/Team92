<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '果物',
        ]);
        Category::create([
            'name' => '靴',
        ]);
        Category::create([
            'name' => '服',
        ]);
        Category::create([
            'name' => '日用品',
        ]);
        Category::create([
            'name' => '電化製品',
        ]);
    }
}
