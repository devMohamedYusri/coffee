@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Update User</h2>
                <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name') ? old('name') : $user->name }}" id="name"
                            placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email') ? old('email') : $user->email }}" id="email"
                            placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control"
                            value="{{ old('password') ? old('password') : $user->password }}" id="password"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="{{ old('first_name') ? old('first_name') : $user->first_name }}" id="first_name"
                            placeholder="Enter your first name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ old('last_name') ? old('last_name') : $user->last_name }}" id="last_name"
                            placeholder="Enter your last name" >
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone') ? old('phone') : $user->phone }}" id="phone"
                            placeholder="Enter your phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address') ? old('address') : $user->address }}" id="address"
                            placeholder="Enter your address">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control"
                            value="{{ old('city') ? old('city') : $user->city }}" id="city"
                            placeholder="Enter your city" >
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control"
                            value="{{ old('country') ? old('country') : $user->country }}" id="country"
                            placeholder="Enter your country">
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control"
                            value="{{ old('postal_code') ? old('postal_code') : $user->postal_code }}" id="postal_code"
                            placeholder="Enter your postal code" >
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar"
                            placeholder="Enter your avatar">
                        <input type="text" name="old_avatar" value="{{ $user->avatar }}" hidden>
                        <img src="{{ asset($user->avatar) }}" alt="avatar" class="img-thumbnail img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="number_of_orders" class="form-label">Number of Orders</label>
                        <input type="text" name="number_of_orders" class="form-control"
                            value="{{ old('number_of_orders') ? old('number_of_orders') : $user->number_of_orders }}"
                            id="number_of_orders" placeholder="Enter number of orders" >
                    </div>
                    <div class="mb-3">
                        <label for="number_of_bookings" class="form-label">Number of Bookings</label>
                        <input type="text" name="number_of_bookings" class="form-control"
                            value="{{ old('number_of_bookings') ? old('number_of_bookings') : $user->number_of_bookings }}"
                            id="number_of_bookings" placeholder="Enter number of bookings" >
                    </div>
                    <div class="mb-3">
                        <label for="total_spent" class="form-label">Total Spent</label>
                        <input type="text" name="total_spent" class="form-control"
                            value="{{ old('total_spent') ? old('total_spent') : $user->total_spent }}" id="total_spent"
                            placeholder="Enter total spent" >
                    </div>
                    <div class="mb-3">
                        <label for="points" class="form-label">Points</label>
                        <input type="text" name="points" class="form-control"
                            value="{{ old('points') ? old('points') : $user->points }}" id="points"
                            placeholder="Enter points" >
                    </div>
                    <div class="mb-3">
                        <label for="number_of_reviews" class="form-label">Number of Reviews</label>
                        <input type="text" name="number_of_reviews" class="form-control"
                            value="{{ old('number_of_reviews') ? old('number_of_reviews') : $user->number_of_reviews }}"
                            id="number_of_reviews" placeholder="Enter number of reviews" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
