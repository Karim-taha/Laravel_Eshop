<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(9)->get();     // SELECT * FROM products WHERE trending = '1' LIMIT = 9;
        return view('layouts.frontend.index', ['featured_products' => $featured_products]);
    }
}
