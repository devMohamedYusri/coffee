<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Authenticatable;
    use RegistersUsers;

    public function login()
    {
        return view('admin.login');
    }

    public function checkAdmin()
    {
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return to_route('admin.dashboard');
        }
        return "please enter valid email and password";
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return to_route('admin.login');
    }

    public function index() {
        $admins=Admin::all();
        return view('admin.admins.index',['admins'=>$admins]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return to_route('admin.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return to_route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return to_route('admin.admins.index');
    }
}
