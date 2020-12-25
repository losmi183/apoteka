<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Images;
use App\Models\Product;
use App\Models\Category;
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

        $category = Category::find($product->category_id);
        $subcategory = Category::find($product->subcategory_id);

        $randomProductsAtAction = Product::where('id', '!=', $product->id)
            ->where('category_id', '!=', 'null')
            ->where('subcategory_id', '!=', 'null')
            ->inRandomOrder()
            ->take(4)->get();
        
        return view('product', compact('product', 'randomProductsAtAction', 'category', 'subcategory'));
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
            'tag' => 'required'
        ]);

        $tag = $request->tag;

        $products = Product::search($request->tag)
        ->paginate(16);

        return view('search', compact('products', 'tag'));
    }

    public function action($slug)   
    {
        $action = Action::where('slug', $slug)->first();

        $products = Product::where('action_id', $action->id)->paginate(9);

        return view('action', compact('action', 'products'));
    }
}
