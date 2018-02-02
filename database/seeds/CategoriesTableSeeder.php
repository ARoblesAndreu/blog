<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category = new Category();
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category();
        $category->name = "Categoria 2";
        $category->save();
    }
}
