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
    public function index($category_id = 0, $subcategory_id = 0)
    {
        if($category_id) {
            $category = Category::find($category_id);
            $subcategories = Category::where('parent_id', $category_id)->get();
        } else {
            $categoryName = "Svi proizvodi";
        }
        
        $products = Product::when($category_id, function($query, $category_id) {
            return $query->where('category_id', $category_id);
        })
        ->when($subcategory_id, function($query, $subcategory_id) {
            return $query->where('subcategory_id', $subcategory_id);
        })
        ->paginate(3);

        return view('shop', compact('products', 'category', 'subcategories', 'category_id', 'subcategory_id'));
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
    public function show(Product $product)
    {
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
        $search = $request->search;

        $products = Product::where('ime', 'like', '%'.$request->search.'%')->paginate(15);

        return view('search', compact('products', 'search'));
    }
}
