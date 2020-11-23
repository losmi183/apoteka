<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Optional $category_id parametar, if send show that category, else show all categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_slug = 0, $subcategory_slug = 0)
    {   
        
        // Get Category Based on slug
        $category = Category::where('slug', $category_slug)->first();
        // Get all subcategories for this category
        $subcategories = Category::where('parent_id', $category->id)->get();
        
        
        // Check if we have slug for subcategory in route
        if($subcategory_slug) {
            // Get subcategory based on slug
            $subcategory = Category::where('slug', $subcategory_slug)->first();
        } else {
            $subcategory = 0;
        }  
        
        // Get query string for sorting
        $cena = request()->query('cena');       

        /**
         * 
         * MAIN QUERY TO MYSQL
         * 
         */
        // Conditional query, based on route $category_id and $subcategory_id
        $products = Product::where('category_id', $category->id)
        ->selectBySubcategory($subcategory)
        // ->when($subcategory, function($query, $subcategory) {
        //     return $query->where('subcategory_id', $subcategory->id);
        // })
        ->sortPrice($cena)

        ->paginate(9);

        // return view('shop', compact('products', 'category', 'subcategories', 'subcategory'));
        return view('shop', [
            'products' => $products,
            'selected_category' => $category,
            'all_subcategories' => $subcategories,
            'selected_subcategory' => $subcategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_slug)
    {
        // Find Product based on slug
        $product = Product::where('slug', $product_slug)->first();

        $categoryName = Category::find($product->category_id)->name;

        $images = Images::where('product_id', $product->id)->get();

        $randomProducts = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();
        
        return view('product', compact('product', 'randomProducts', 'categoryName', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     * Custom Actions
     * 
     */
    public function search(Request $request)
    {   
        $request->validate([
            'search' => 'min:3'
        ],
        [
            'search.min' => 'Potrebna su najmanje 3 slova za pretragu'
        ]);

        $search = $request->search;

        $cena = request()->cena;


        // $products = Product::where('ime', 'like', "%$search%")->get();
        $products = Product::search($search)
        ->sortPrice($cena)
        ->paginate(12);

        // return $products;

        return view('search', compact('products', 'search'));
    }
}
