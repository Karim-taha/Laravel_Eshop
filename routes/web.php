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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    // Route::get('/dashboard', function () {
    //     return view('layouts.admin.index');
    // });

    Route::get('/dashboard', 'admin\FrontendController@index')->name('dashboard');

    // Categories routes :
    Route::get('/categories', 'admin\CategoryController@index')->name('categories');  // Show all categories.
    Route::get('/categories/add-category', 'admin\CategoryController@add')->name('addCategory');  // Add new category.
    Route::post('/categories/add-category', 'admin\CategoryController@insert')->name('insertCategory');  // Save new category.
    Route::get('/categories/edit-category/{id}', 'admin\CategoryController@edit')->name('editCategory');  // Edit a category.
    Route::put('/categories/update-category/{id}', 'admin\CategoryController@update')->name('updateCategory');  // Update the category.
    Route::delete('/categories/delete-category/{id}', 'admin\CategoryController@destroy')->name('deleteCategory');  // Update the category.
});

