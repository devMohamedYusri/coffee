<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer\Review;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=ProductController::discoverProducts();
        $reviews=self::reviews();
        return view('home',[
            'products'=>$products,
            'reviews'=>$reviews,
        ]);
    }

    public function menu() {
        $drinks=ProductController::drinks();
        $desserts=ProductController::desserts();
        return view('main.menu',[
            'drinks'=>$drinks,
            'desserts'=>$desserts
        ]);
    }
    static public function reviews() {
        $reviews=Review::join('users','reviews.user_id','users.id')
        ->select('reviews.*','users.name as username' ,'users.avatar as avatar')
        ->take(6)
        ->get();
        return $reviews;
    }


    public function services() {
        return view('main.services');
    }

    public function about() {
        $reviews=self::reviews();
        return view('main.about',['reviews'=>$reviews]);
    }
}
