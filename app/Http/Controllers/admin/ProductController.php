<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('layouts.admin.products.index', ['products' => $products]);
    }

    public function add()
    {
        $categories = Category::all();   // We will get all categories in select.
        return view('layouts.admin.products.add',['categories' => $categories]);
    }

    public function insert(Request $request)
    {
        $product = new Product;

        if($request->hasFile('image')){
            $file = $request->image;    // get the file from $request
            $ext  = $file->getClientOriginalExtension();  // get the extension of the file (png or jpg ...)
            $fileName = time(). '.' .$ext;                  // Create file format to save it.
            $file->move('assets/uploads/products', $fileName);  // save the file in public folder
            $product->image = $fileName;     // assign the image name that will be save in database to the new format.
        }

        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_Price = $request->original_Price;
        $product->selling_Price = $request->selling_Price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = $request->status == TRUE ? '1':'0';
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->mate_title = $request->mate_title;
        $product->mate_keywords = $request->mate_keywords;
        $product->mate_description = $request->mate_description;
        $product->save();
        return redirect()->route('products')->with('status', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        return view('layouts.admin.products.edit', ['product' => $product]);
    }


    public function update(Request $request, $id)
    {
        $product = Product::findorfail($id);

        if($request->hasFile('image')){
            $path = 'assets/uploads/products/'.$product->image;
            if(File::exists($path)){  // if there is an image for this category delete it because we will add a new one.
                File::delete($path);
            }
            $file = $request->image;    // get the file from $request
            $ext  = $file->getClientOriginalExtension();  // get the extension of the file (png or jpg ...)
            $fileName = time(). '.' .$ext;                  // Create file format to save it.
            $file->move('assets/uploads/products', $fileName);  // save the file in public folder
            $product->image = $fileName;     // assign the image name that will be save in database to the new format.
        }

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->status = $request->status == TRUE ? '1':'0';  // If checked make the status = 1, if not make the status = 0
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->mate_title = $request->mate_title;
        $product->mate_description = $request->mate_description;
        $product->mate_keywords = $request->mate_keywords;
        $product->update();
        return redirect()->route('products')->with('status', 'Product Updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findorfail($id);
            if($product->image){
                $path = 'assets/uploads/products/'.$product->image;
                    if(File::exists($path)){  // if there is an image for this category delete it.
                        File::delete($path);
                    }
            }
        $product->delete();
        return redirect()->route('products')->with('status', 'Product Deleted successfully');
    }


}
