<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            'users'=>User::select()->orderBY('id','asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $file=$request->file('avatar');
        $ext=$file->extension();
        $filename=time().'.'.$ext;
        $file->move(public_Path('assets/users/'),$filename);
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'avatar' => 'assets/users/'.$filename,
                'number_of_orders' => $request->number_of_orders,
                'number_of_bookings' => $request->number_of_bookings,
                'total_spent' => $request->total_spent,
                'points' => $request->points,
                'number_of_reviews' => $request->number_of_reviews,
            ]);
            return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'user'=>$user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $storedName="";
        if($request->file('avatar')){
            $file=$request->file('avatar');
            $ext=$file->extension();
            $filename=time().'.'.$ext;
            $file->move(public_Path('assets/users/'),$filename);
            $storedName='assets/users/'.$filename;
        }else{
            $storedName=$request->old_avatar;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password==$user->password?$user->password:bcrypt($request->password),
            'first_name' => $request->first_name?$request->first_name:$user->first_name,
            'last_name' => $request->last_name?$request->last_name:$user->last_name,
            'phone' => $request->phone?$request->phone:$user->phone,
            'address' => $request->address?$request->address:$user->address,
            'city' => $request->city?$request->city:$user->city,
            'country' => $request->country?$request->country:$user->country,
            'postal_code' => $request->postal_code?$request->postal_code:$user->postal_code,
            'number_of_orders' => $request->number_of_orders?$request->number_of_orders:$user->number_of_orders,
            'number_of_bookings' => $request->number_of_bookings?$request->number_of_bookings:$user->number_of_bookings,
            'total_spent' => $request->total_spent?$request->total_spent:$user->total_spent,
            'points' => $request->points?$request->points:$user->points,
            'number_of_reviews' => $request->number_of_reviews?$request->number_of_reviews:$user->number_of_reviews,
            'avatar' => $storedName,
        ]);
        return redirect()->route('admin.users.index');
    }
}
