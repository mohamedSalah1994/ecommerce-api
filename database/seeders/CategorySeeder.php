<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Category 1',
                'name_ar' => 'الفئة 1',
                'image' => 'category-1.jpg',
            ],
            [
                'name' => 'Category 2',
                'name_ar' => 'الفئة 2',
                'image' => 'category-2.jpg',
            ],
            [
                'name' => 'Category 3',
                'name_ar' => 'الفئة 3',
                'image' => 'category-3.jpg',
            ],
            [
                'name' => 'Category 4',
                'name_ar' => '4 الفئة',
                'image' => 'category-4.jpg',
            ],
            [
                'name' => 'Category 5',
                'name_ar' => '5 الفئة',
                'image' => 'category-5.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
