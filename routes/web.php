<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');



// admin
Route::get('/dashboard', 'App\Http\Controllers\ADminController@dashboard');
Route::get('/login', 'App\Http\Controllers\AdminController@login');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@admin_dashboard');




// category
Route::get('/add-category', 'App\Http\Controllers\CategoryController@add_category');
Route::post('/save-category', 'App\Http\Controllers\CategoryController@save_category');
Route::get('/all-category', 'App\Http\Controllers\CategoryController@all_category');
Route::get('/unactive-category/{category_id}', 'App\Http\Controllers\CategoryController@unactive_category');
Route::get('/active-category/{category_id}', 'App\Http\Controllers\CategoryController@active_category');
Route::get('/edit-category/{category_id}', 'App\Http\Controllers\CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'App\Http\Controllers\CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'App\Http\Controllers\CategoryController@delete_category');

// type
Route::get('/add-type', 'App\Http\Controllers\TypeController@add_type');
Route::post('/save-type', 'App\Http\Controllers\TypeController@save_type');
Route::get('/all-type', 'App\Http\Controllers\TypeController@all_type');
Route::get('/unactive-type/{type_id}', 'App\Http\Controllers\TypeController@unactive_type');
Route::get('/active-type/{type_id}', 'App\Http\Controllers\TypeController@active_type');
Route::get('/edit-type/{type_id}', 'App\Http\Controllers\TypeController@edit_type');
Route::post('/update-type/{type_id}', 'App\Http\Controllers\TypeController@update_type');
Route::get('/delete-type/{type_id}', 'App\Http\Controllers\TypeController@delete_type');

// author

Route::get('/add-author', 'App\Http\Controllers\AuthorController@add_author');
Route::post('/save-author', 'App\Http\Controllers\AuthorController@save_author');
Route::get('/all-author', 'App\Http\Controllers\AuthorController@all_author');
Route::get('/unactive-author/{author_id}', 'App\Http\Controllers\AuthorController@unactive_author');
Route::get('/active-author/{author_id}', 'App\Http\Controllers\AuthorController@active_author');
Route::get('/edit-author/{author_id}', 'App\Http\Controllers\AuthorController@edit_author');
Route::post('/update-author/{author_id}', 'App\Http\Controllers\AuthorController@update_author');
Route::get('/delete-author/{author_id}', 'App\Http\Controllers\AuthorController@delete_author');


// blog

Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/content-details/{product_id}', 'App\Http\Controllers\ProductController@content_product');

// details blog 

Route::get('/details-blog/{product_id}', 'App\Http\Controllers\ProductController@details_blog');


// public product 

Route::get('/category-full/{category_id}', 'App\Http\Controllers\CategoryController@category_full');
Route::get('/type-full/{type_id}', 'App\Http\Controllers\TypeController@type_full');

// search 

Route::post('/search', 'App\Http\Controllers\HomeController@seach');





