<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Category::count() < 1) {
            Category::insert([
                ['category_name' => 'Category #1'],
                ['category_name' => 'Category #2'],
                ['category_name' => 'Category #3'],
                ['category_name' => 'Category #4'],
                ['category_name' => 'Category #5'],
            ]);
        }
    }
}
