<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserordersController;
use App\Http\Controllers\SubcategoriesController;

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
Route::get('akcije/{slug}', [ShopController::class, 'action']);

/**
 * Pages
 */
Route::get('/pitanja', [PagesController::class, 'questions']);
Route::get('/isporuka', [PagesController::class, 'delivery']);
Route::get('/placanje', [PagesController::class, 'payment']);



/**
 * Auth Routes
 */
Auth::routes();
Route::get('/home', [HomepageController::class, 'index'])->name('home');

/**
 * User Routes / musterije
 * 
 */
Route::get('/moj-profil', [UserdataController::class, 'index']);
Route::patch('/moj-profil/{user}', [UserdataController::class, 'update']);
Route::get('/moje-porudzbine', [UserordersController::class, 'index']);
Route::post('/changePassword', [UserdataController::class, 'changePassword']);


/**
 * Cart Routes
 */
Route::get('/checkout', [CheckoutController::class, 'index']);

Route::resource('/cart', CartController::class);

// Cart Content Ajax Request
Route::get('/cartContent', [CartController::class, 'cartContent']);


Route::get('/cartshow', function() {
    dd(Cart::content());    
});

Route::get('/cartDelete', function() {
    Cart::destroy();
});
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove']);

Route::get('/cart/decrementQty/{rowId}', [CartController::class, 'decrementQty']);
Route::get('/cart/incrementQty/{rowId}', [CartController::class, 'incrementQty']);

Route::post('cart/quantity', [CartController::class, 'quantityChange']);

/**
 * Order / Checkout
 */
Route::post('/order', [CheckoutController::class, 'store']);
Route::view('/thankyou', 'thankyou');


/**
 * 
 * Admin Area Routes
 * 
 */
Route::get('/admin', [DashboardController::class, 'index']);

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
Route::get('/product/discount/{action}', [ProductsController::class, 'discount']);



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


// Users Admin routes
Route::get('/admin/users/{role?}', [UsersController::class, 'index']); 
// Ajax change role
Route::post('/admin/users/changeRole', [UsersController::class, 'changeRole']); 