<?php

namespace App\Http\Controllers;

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
    public function index($category_id = 0)
    {
        if($category_id) {
            $categoryName = Category::find($category_id)->name;
        } else {
            $categoryName = "Svi proizvodi";
        }
        
        $products = Product::when($category_id, function($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->paginate(6);

        return view('shop', compact('products', 'categoryName'));
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

        $randomProducts = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();
        return view('product', compact('product', 'randomProducts', 'categoryName'));
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

        $categoryName = $request->search;

        $products = Product::where('ime', 'like', '%'.$request->search.'%')->paginate(6);

        return view('shop', compact('products', 'categoryName'));
    }
}
