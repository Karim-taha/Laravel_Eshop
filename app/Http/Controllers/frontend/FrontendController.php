<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(9)->get();     // SELECT * FROM products WHERE trending = '1' LIMIT = 9;
        $trending_categories = Category::where('popular', '1')->take(9)->get();     // SELECT * FROM products WHERE trending = '1' LIMIT = 9;
        return view('layouts.frontend.index', ['featured_products' => $featured_products], ['trending_categories' => $trending_categories]);
    }

    public function category()
    {
        $categories = Category::where('status', '0')->get();
        return view('layouts.frontend.category', ['categories' => $categories]);
    }

    public function showCategory($slug)
    {
        // Check if the slug exists :
            if(Category::where('slug', $slug)->exists())
            {
                // Get the category where the slug in request = slug in db :
                $category = Category::where('slug', $slug)->first();
                // Get all products related to this category :
                $products = Product::where('cate_id', $category->id)->get();
                return view('layouts.frontend.showCategory', ['category' => $category], ['products' => $products]);
            }
            else{
                return view('/')->with('status', 'Slug not exists');
            }
    }
}
