<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.index',[
            'orders'=>self::allOrders()
        ]);
    }

    static public function allOrders() {
        $orders=Order::all();
        return $orders;
    }

    public function edit(Order  $order)
    {
        return view('admin.orders.edit',[
            'order'=>$order
        ]);
    }

    public function update(Request $request,Order  $order)
    {
        $order->update($request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy(Order  $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

}
