<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['categoryName' => 'Uzkodas']);
        Category::create(['categoryName' => 'Brokastis']);
        Category::create(['categoryName' => 'Pusdienas']);
        Category::create(['categoryName' => 'Vakariņas']);
        Category::create(['categoryName' => 'Deserti']);
        Category::create(['categoryName' => 'Zupas']);
        Category::create(['categoryName' => 'Ātri pagatavojami ēdieni']);
    }
}
