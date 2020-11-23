<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/prodavnica/{category_slug}/{subcategory_slug?}', [ShopController::class, 'index']);
Route::get('/pretraga', [ShopController::class, 'search']);
Route::get('/proizvodi/{product_slug}', [ShopController::class, 'show']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * 
 * Admin Area Routes
 * 
 */
Route::view('/admin', 'admin.admin');

// Product CRUD
Route::get('/products/{category_id?}/{subcategory_id?}', [ProductsController::class, 'index'])->name('products');
Route::get('/product/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('products.create');
Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])->name('products.edit');
Route::patch('/product/update/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/product/delete/{product}', [ProductsController::class, 'destroy'])->name('products.delete');

// Ajax Requests
Route::get('/product/fetchSubcategories/{category_id}', [ProductsController::class, 'fetchSubcategories']);
Route::post('/product/createSlug', [ProductsController::class, 'createSlug']);

// Categories Crud
Route::get('/categoriesAdmin/{category_id?}', [CategoriesController::class, 'index'])->name('categories');

