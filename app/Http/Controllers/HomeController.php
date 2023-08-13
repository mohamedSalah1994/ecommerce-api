<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getItemsWithDiscount()
    {
      $categories = Category::all();
      // $items = Item::with('category')->get();
      $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
      ->select('items.*', 'categories.name as category_name' , 'categories.name_ar as category_name_ar' , 'categories.image as category_image' , 'categories.created_at as category_created_at', 'categories.updated_at as category_updated_at')
      ->where('discount', '<>', 0)
      ->get();
  
      return response()->json([
        'status' => 'success',
        'categories' => $categories,
        'items' => $items,

    ]);
    }

}
