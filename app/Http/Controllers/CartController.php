<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $randomProducts = Product::haveCatAndSubcats()->inRandomOrder()->take(8)->get();
        // dd(Cart::content());
        return view('cart', compact('randomProducts'));
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
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->discount ?? $request->price,
            'weight' => 1,
            'options' => [
                'slug' => $request->slug,
                'image' => $request->image
            ]
        ]);

        return back()->with('success', 'Proizvod je dodat u korpu');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Custom Cart methods
     */


     /**
     * Remove the specified row from cart
     *
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function remove($rowId)
    {
        Cart::remove($rowId);        

        return back()->with('success', 'Proizvod je uklonjen iz korpe');        
    }
     /**
     * Change quantity for specified row
     *
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function quantityChange(Request $request)
    {
        Cart::update($request->rowId, $request->quantity); 

        return back()->with('success', 'Promenjena je količina');
    }


    public function decrementQty($rowId)
    {
        // Whole cart content
        $cart = Cart::content();

        // Filter by rowId 
        $item = $cart->filter(function($cart) use($rowId) {
            return $cart->rowId == $rowId;
        })->first();

        // // Check if item is lower then 1, then remove item
        if($item->qty > 1) {
            $qty = $item->qty - 1;        
            Cart::update($rowId, $qty); 
        }
        return back();
    }
    public function incrementQty($rowId)
    {
        // Whole cart content
        $cart = Cart::content();

        // Filter by rowId 
        $item = $cart->filter(function($cart) use($rowId) {
            return $cart->rowId == $rowId;
        })->first();

        // // Check if item is lower then 1, then remove item
        if($item->qty < 100) {
            $qty = $item->qty + 1;        
            Cart::update($rowId, $qty); 
        }
        return back();
    }
}
