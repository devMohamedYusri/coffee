<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\customer\Review;
use App\Http\Controllers\Controller;
use App\Models\customer\Reservation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    public function userOrders()
    {
        $orders = Order::select('orders.*', 'users.name as first_name', 'users.email as email')->join('users', 'orders.user_id', 'users.id')->where('user_id', auth()->user()->id)->orderBy('total', 'desc')->get();
        return view('users.orders', [
            'orders' => $orders
        ]);
    }


    public function userBookings()
    {
        $books = Reservation::where('user_id', auth()->user()->id)->get();
        return view('users.bookings', [
            'books' => $books
        ]);
    }

    public function review_page($id, $type)
    {
        if (auth()->user()->id == null) {
            return redirect()->route('login');
        }
        return view('users.review', [
            'type' => $type,
            'id' => $id
        ]);
    }


    public function store(Request $request)
    {
        Review::create($request->all());
        if($request->type_of_service == 'booking'){
            Reservation::where('id', $request->order_id)
            ->where('user_id', auth()->user()->id)->update([
                'status' => 'reviewed'
            ]);
            return to_route('coffee.user.bookings');
        }else{
            Order::where('id', $request->order_id)
            ->where('user_id', auth()->user()->id)->update([
                'status' => 'reviewed'
            ]);
            return to_route('coffee.user.orders');
        }
    }

    static public function update($arr){
        User::where('id', auth()->user()->id)->update($arr);
    }
}
