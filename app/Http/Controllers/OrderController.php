<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    // Allow access for publishers and admins
    public function __construct()
    {
        $this->middleware('publisher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = 0)
    {
        $orders = Order::orderBy('status', 'ASC')
            ->when($status, function($query, $status) {
                return $query->where('status', $status);
            })
            ->paginate(20);

        return view('admin.orders.index', compact('orders', 'status'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order = Order::where('id', $order_id)->with('products')->first();

        return view('admin.orders.show', compact('order'));
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
     * Custom Methods
     */
        
     /**
     * Change status of the order
     *
     * @param  Request $request, Order $order
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return back()->with('success', 'Status Porudzbine promenjen');
    }
}
