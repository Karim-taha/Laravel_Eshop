<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        // Check if user logged in :
        if(Auth::check())
        {
            // Check if the product exists :
            $porduct_exists = Product::where('id', $prod_id)->first();
            if($porduct_exists){
                // Chect if the product already exists in the cart :
                if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $porduct_exists->name.' Already dded to cart.']);
                }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $prod_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $prod_qty;
                $cartItem->save();
                return response()->json(['status' => $porduct_exists->name.' Added to cart successfully.']);
                }
            }
        }else{
            return response()->json(['status' => 'Login to continue']);
        }

    }
}
