<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request){

        $category = new Category;
        $categories = $category->getCategoryList();
        $categoryId = $request->input('categoryId');
        $keyword = $request->input('keyword');
        $order = $request->order;

        $query = Item::query();

        if (isset($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        switch ($order) {
            case 'desc':
                $item = $query->orderBy('id', 'desc')->paginate(7);
            break;

            case 'asc':
                $item = $query->orderBy('id', 'asc')->paginate(7);
            break;
            
            default :
            $item = $query->orderBy('id', 'desc')->paginate(7);
            break;
        }
        
        return view('index', [
            'item' => $item,
            'keyword' => $keyword,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'order' => $order,
        ]);
    }

    public function product_detail(Request $request){

        $item = Item::where('id', "=", $request->id)->first();

        return view('/product_detail', ['item' => $item,]);
    }
}
