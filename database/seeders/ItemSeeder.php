<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      $items = [
        [
          'name' => 'Item 1',
          'name_ar' => 'السلعة 1',
          'desc' => 'This is the description of item 1.',
          'desc_ar' => 'هذه هي الوصف من السلعة 1.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 100,
          'count' => 5,
          'discount' => 0,
          'active' => true,
          'category_id' => 1,
        ],
        [
          'name' => 'Item 2',
          'name_ar' => 'السلعة 2',
          'desc' => 'This is the description of item 2.',
          'desc_ar' => 'هذه هي الوصف من السلعة 2.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 100,
          'count' => 10,
          'discount' => 10,
          'active' => true,
          'category_id' => 2,
        ],
        [
          'name' => 'Item 3',
          'name_ar' => 'السلعة 3',
          'desc' => 'This is the description of item 3.',
          'desc_ar' => 'هذه هي الوصف من السلعة 3.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 300,
          'count' => 15,
          'discount' => 20,
          'active' => true,
          'category_id' => 3,
        ],
        [
          'name' => 'Item 4',
          'name_ar' => 'السلعة 4',
          'desc' => 'This is the description of item 4.',
          'desc_ar' => 'هذه هي الوصف من السلعة 4.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 100,
          'count' => 5,
          'discount' => 0,
          'active' => true,
          'category_id' => 1,
        ],
        [
          'name' => 'Item 5',
          'name_ar' => 'السلعة 5',
          'desc' => 'This is the description of item 5.',
          'desc_ar' => 'هذه هي الوصف من السلعة 5.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 100,
          'count' => 5,
          'discount' => 0,
          'active' => true,
          'category_id' => 1,
        ],
        [
          'name' => 'Item 6',
          'name_ar' => 'السلعة 6',
          'desc' => 'This is the description of item 6.',
          'desc_ar' => 'هذه هي الوصف من السلعة 6.',
          'image' => 'https://via.placeholder.com/150x150',
          'price' => 100,
          'count' => 5,
          'discount' => 0,
          'active' => true,
          'category_id' => 2,
        ],
      ];
  
      foreach ($items as $item) {
        Item::create($item);
    }
    }
}
