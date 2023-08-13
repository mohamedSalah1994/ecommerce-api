<?php

namespace App\Http\Controllers\items;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
  public function index()
  {
    $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
      ->select('items.*', 'categories.name as category_name', 'categories.name_ar as category_name_ar', 'categories.image as category_image', 'categories.created_at as category_created_at', 'categories.updated_at as category_updated_at')

      ->get();

    return response()->json([
      'status' => 'success',
      'items' => $items,

    ]);
  }

  public function showProducts(int $id)
  {
    $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
      ->select('items.*', 'categories.name as category_name', 'categories.name_ar as category_name_ar', 'categories.image as category_image', 'categories.created_at as category_created_at', 'categories.updated_at as category_updated_at')
      ->where('category_id', $id)
      ->get();
    return response()->json([
      'status' => 'success',
      'items' => $items,


    ]);
  }
}
