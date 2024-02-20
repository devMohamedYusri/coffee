@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Create User</h2>
                <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password </label>
                        <input type="text" name="password" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter your last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter your address" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" id="country" placeholder="Enter your country" required>
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Enter your postal code" required>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" required>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_orders" class="form-label">Number of Orders</label>
                        <input type="text" name="number_of_orders" class="form-control" id="number_of_orders" placeholder="Enter number of orders" required>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_bookings" class="form-label">Number of Bookings</label>
                        <input type="text" name="number_of_bookings" class="form-control" id="number_of_bookings" placeholder="Enter number of bookings" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_spent" class="form-label">Total Spent</label>
                        <input type="text" name="total_spent" class="form-control" id="total_spent" placeholder="Enter total spent" required>
                    </div>
                    <div class="mb-3">
                        <label for="points" class="form-label">Points</label>
                        <input type="text" name="points" class="form-control" id="points" placeholder="Enter points" required>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_reviews" class="form-label">Number of Reviews</label>
                        <input type="text" name="number_of_reviews" class="form-control" id="number_of_reviews" placeholder="Enter number of reviews" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
