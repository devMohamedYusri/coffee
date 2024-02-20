<?php

namespace App\Http\Controllers;

use App\Http\Controllers\users\UserController;
use App\Models\customer\Reservation;
use App\Models\product\Cart;
use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $related_products = self::relatedProducts($product->id);
        return view('product.show', [
            'product' => $product,
            'related_products' => $related_products
        ]);
    }

    static public function discoverProducts()
    {
        $products = Product::select()->orderby('price', 'desc')->take(4)->get();
        return $products;
    }
    static public function relatedProducts($id)
    {
        $product = Product::find($id);
        $products = Product::select()
            ->where('category_id', '=', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderby('price', 'desc')
            ->take(4)->get();
        return $products;
    }

    public function cart()
    {
        $cart_products = Cart::select('carts.id as cart_id', 'carts.quantity as quantity', 'carts.total as total', 'products.*')
            ->rightJoin('products', 'products.id', '=', 'carts.product_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $totalPrice = Cart::where('user_id', Auth::user()->id)->sum('total');
        $products = [];
        foreach ($cart_products as $cart_product) {
            $products[] = $cart_product;
        }
        return view('product.cart', [
            'cart_products' => $products,
            'discover' => self::discoverProducts(),
            'totalPrice' => $totalPrice,
        ]);
    }

    public function addCart(Request $request, Product $product)
    {
        if ($cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first()) {
            if ($cart) {
                $cart->update([
                    $cart->quantity = $request->quantity,
                    $cart->total = $request->quantity * $product->price,
                ]);
            }
            return to_route('coffee.user.cart');
        }
        Auth::user()->points+=10;
        UserController::update(['points' => Auth::user()->points]);

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity ? $request->quantity : 1,
            'total' => $request->quantity * $product->price
        ]);
        return to_route('coffee.user.cart');
    }

    public function removeCart($cart_id)
    {
        Cart::where('user_id', Auth::user()->id)
            ->find($cart_id)
            ->delete();
        return to_route('coffee.user.cart');
    }

    public function prepare(Request $request)
    {
        Session::put('price', $request->total);
        $price = Session::get('price');
        if ($price > 0) {
            return to_route('coffee.checkout.page');
        } else {
            return to_route('coffee.user.cart');
        }
    }


    public function checkout_page()
    {
        return view('product.checkout');
    }

    public function newOrder(Request $request)
    {
        Order::create($request->all());
        Cart::where('user_id', Auth::user()->id)->delete();
        return to_route('coffee.checkout.pay');
    }
    public function pay()
    {
        return view('coffee.checkout.pay');
    }

    public function pay_successfully()
    {
        Auth::user()->points+=50;
        Auth::user()->total_spent+=Session::get('price');
        UserController::update(['points' => Auth::user()->points, 'total_spent' => Auth::user()->total_spent]);
        Session::forget('price');
        return view('coffee.checkout.success');
    }

    public function  store(Request $request)
    {
        if ($request->date < date('Y-m-d') || $request->time < time()) {
            return Redirect::back();
        }
        Reservation::create($request->all());
        return Redirect::back();
    }

    static public function desserts()
    {
        $results = Product::where('category_id', 2)->take(6)->get();
        $desserts=[];
        foreach($results as $res){
            $desserts[]=$res;
        }
        return $desserts;
    }
    static public function drinks()
    {
        $results = Product::where('category_id', 1)->take(6)->get();
        $drinks=[];
        foreach($results as $res){
            $drinks[]=$res;
        }
        return $drinks;
    }
}
