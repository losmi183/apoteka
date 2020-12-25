<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\CheckoutStoreRequest;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = ''; 
        // Fetch logged user if exsist
        if(Auth::check()) {
            $user = Auth::user();
        }

        if(Cart::count() == 0) {
            return back()->with('error', 'Korpa je prazna');
        }        

        return view('checkout', compact('user'));
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
    public function store(CheckoutStoreRequest $request)
    {
        // return $request->all();
        if(Cart::count() == 0) {
            return redirect()->route('pocetna');
        }

        // Create Order
        $order = Order::create([
            'ime' => $request->ime,
            // 'prezime' => $request->prezime,
            'email' => $request->email,
            'adresa' => $request->adresa,
            'telefon' => $request->telefon,
            'grad' => $request->grad,
            'napomene' => $request->napomene,
            'suma' => Cart::subtotal()
        ]);

        // Adding user id if user logged in / if not null
        if(Auth::check()) {
            $order->user_id = Auth::user()->id;
            $order->save();
        }

        // ProductOrder
        foreach(Cart::content() as $item) {
            OrderProduct::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'quantity' => $item->qty
            ]);
        }

        // Destroying Cart after ordering
        Cart::destroy();

        return view('thankyou');
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
}
