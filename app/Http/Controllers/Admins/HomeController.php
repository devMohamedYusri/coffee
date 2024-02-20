<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\customer\Review;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Models\customer\Reservation;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'admins'=>self::numberOfAdmins(),
            'bookings'=>self::numberOfBookings(),
            'orders'=>self::numberOfOrders(),
            'products'=>self::numberOfProducts(),
            'users'=>self::numberOfUsers(),
            'drinks'=>self::numberOfDrinks(),
            'desserts'=>self::numberOFDesserts(),
            'reviews'=>self::numberOfReviews(),
        ]);
    }


    public function numberOfOrders()
    {
        $orders=Order::count();
        return $orders;
    }

    public function numberOfBookings()
    {
        $bookings=Reservation::count();
        return $bookings;
    }

    public function numberOfUsers()
    {
        $Users=User::count();
        return $Users;
    }

    public function numberOfAdmins()
    {
        $admins=Admin::count();
        return $admins;
    }

    public function numberOfProducts()
    {
        $products=Product::count();
        return $products;
    }

    public function numberOfDrinks()
    {
        $drinks=Product::where('category_id',1)->count();
        return $drinks;
    }

    public function numberOFDesserts()
    {
        $drinks=Product::where('category_id',2)->count();
        return $drinks;
    }

    public function numberOfReviews()
    {
        $drinks=Review::count();
        return $drinks;
    }
}
