<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubcategoriesController;
use Gloudemans\Shoppingcart\Facades\Cart;

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

/**
 * Home page
 */
Route::get('/', [HomepageController::class, 'index'])->name('pocetna');
/**
 * Shop Routes
 */
Route::get('/prodavnica/{category_slug}/{subcategory_slug?}', [ShopController::class, 'index']);
Route::get('/pretraga', [ShopController::class, 'search']);
Route::get('/proizvodi/{product_slug}', [ShopController::class, 'show']);
Route::get('action/{slug}', [ShopController::class, 'action']);



/**
 * Auth Routes
 */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * Cart Routes
 */
Route::resource('/cart', CartController::class);

Route::get('/cartDelete', function() {
    Cart::destroy();
});
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove']);
Route::post('cart/quantity', [CartController::class, 'quantityChange']);

/**
 * Order
 */
Route::post('/order', [OrderController::class, 'store']);


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
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');
Route::delete('/category/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');

Route::get('/subcategories/{category}', [SubcategoriesController::class, 'index']);
Route::post('/subcategory', [SubcategoriesController::class, 'store']);
Route::delete('/subcategory/{category}', [SubcategoriesController::class, 'destroy']);

// Ajax Requests
Route::post('/category/createSlug', [ProductsController::class, 'createSlug']);


// Orders Routes
Route::get('/admin/orders/{status?}', [OrderController::class, 'index']); 
Route::get('/admin/order/{order}', [OrderController::class, 'show']); 
Route::post('/order/status/{order}', [OrderController::class, 'statusChange']); 


// Actions Routes
Route::resource('actions', ActionsController::class);
