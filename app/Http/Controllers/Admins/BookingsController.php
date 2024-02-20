<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\customer\Reservation;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        $books=Reservation::get();
        return view('admin.bookings.index',['books'=>$books]);
    }

    public function edit(Reservation  $book)
    {
        return view('admin.bookings.edit',[
            'book'=>$book
        ]);
    }

    public function update(Request $request,Reservation  $book)
    {
        $book->update($request->all());
        return redirect()->route('admin.bookings.index');
    }

    public function destroy(Reservation  $book)
    {
        $book->delete();
        return redirect()->route('admin.bookings.index');
    }
}
