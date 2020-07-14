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
        return $dataCategories = [
            ['name' => 'Politics',
            'slug' => 'Politics'],
            ['name' => 'Entertainment',
            'slug' => 'Entertainment'],
            ['name' => 'Sport',
            'slug' => 'Sport'],
            ['name' => 'Worklife',
            'slug' => 'Worklife'],
            ['name' => 'Travel',
            'slug' => 'Travel'],
            ['name' => 'Future',
            'slug' => 'Future'],
            ['name' => 'Culture',
            'slug' => 'Culture'],
        ];

        foreach ($dataCategories as $dataCategory) {
            $category = new Category();
            $category->name = $dataCategories['name'];
            $category->sluger = $dataCategory['slug'];
            $category->save();

        }
    }
}
