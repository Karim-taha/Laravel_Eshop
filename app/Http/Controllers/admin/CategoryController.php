<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('layouts.admin.categories.index',["categories" => $categories]);
    }

    public function add()
    {
        return view('layouts.admin.categories.add');
    }

    public function insert(Request $request)
    {
        $category = new Category;

        if($request->hasFile('image')){
            $file = $request->image;    // get the file from $request
            $ext  = $file->getClientOriginalExtension();  // get the extension of the file (png or jpg ...)
            $fileName = time(). '.' .$ext;                  // Create file format to save it.
            $file->move('assets/uploads/categories', $fileName);  // save the file in public folder
            $category->image = $fileName;     // assign the image name that will be save in database to the new format.
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';  // If checked make the status = 1, if not make the status = 0
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_descrip = $request->meta_descrip;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect()->back()->with('status', 'Category Added Successfully');
    }


    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('layouts.admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findorfail($id);

        if($request->hasFile('image')){
            $path = 'assets/uploads/categories/'.$category->image;
            if(File::exists($path)){  // if there is an image for this category delete it because we will add a new one.
                File::delete($path);
            }
            $file = $request->image;    // get the file from $request
            $ext  = $file->getClientOriginalExtension();  // get the extension of the file (png or jpg ...)
            $fileName = time(). '.' .$ext;                  // Create file format to save it.
            $file->move('assets/uploads/categories', $fileName);  // save the file in public folder
            $category->image = $fileName;     // assign the image name that will be save in database to the new format.
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';  // If checked make the status = 1, if not make the status = 0
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_descrip = $request->meta_descrip;
        $category->meta_keywords = $request->meta_keywords;
        $category->update();
        return redirect()->route('categories')->with('status', 'Category Updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findorfail($id);
            if($category->image){
                $path = 'assets/uploads/categories/'.$category->image;
                    if(File::exists($path)){  // if there is an image for this category delete it.
                        File::delete($path);
                    }
            }
        $category->delete();
        return redirect()->route('categories')->with('status', 'Category Deleted successfully');
    }

}
