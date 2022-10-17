<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Front-end Routes :
Route::get('/', 'frontend\FrontendController@index')->name('homePage');
Route::get('/category', 'frontend\FrontendController@category')->name('frontCategory');
Route::get('/showCategory/{slug}', 'frontend\FrontendController@showCategory')->name('showCategory');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes :
Route::middleware(['auth', 'isAdmin'])->group(function(){
    // Route::get('/dashboard', function () {
    //     return view('layouts.admin.index');
    // });

    Route::get('/dashboard', 'admin\FrontendController@index')->name('dashboard');

    // Categories routes :
    Route::get('/categories', 'admin\CategoryController@index')->name('categories');  // Show all categories.
    Route::get('/categories/add-category', 'admin\CategoryController@add')->name('addCategory');  // Add new category.
    Route::post('/categories/insert-category', 'admin\CategoryController@insert')->name('insertCategory');  // Save new category.
    Route::get('/categories/edit-category/{id}', 'admin\CategoryController@edit')->name('editCategory');  // Edit a category.
    Route::put('/categories/update-category/{id}', 'admin\CategoryController@update')->name('updateCategory');  // Update the category.
    Route::delete('/categories/delete-category/{id}', 'admin\CategoryController@destroy')->name('deleteCategory');  // Delete the category.

    // Products routes :
    Route::get('/products', 'admin\ProductController@index')->name('products');  // Show all products.
    Route::get('/products/add-product', 'admin\ProductController@add')->name('addProduct');  // Add new product.
    Route::post('/categories/insert-product', 'admin\ProductController@insert')->name('insertProduct');  // Save new product.
    Route::get('/products/edit-product/{id}', 'admin\ProductController@edit')->name('editProduct');  // Edit a product.
    Route::put('/products/update-product/{id}', 'admin\ProductController@update')->name('updateProduct');  // Update the product.
    Route::delete('/products/delete-product/{id}', 'admin\ProductController@destroy')->name('deleteProduct');  // Delete the product.


});

