@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Update order</h2>
                <form method="post" action="{{ route('admin.orders.update', $order->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ? old('last_name') : $order->last_name }}" id="last_name" placeholder="Enter your last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') ? old('city') : $order->city }}" id="city" placeholder="Enter your city" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country') ? old('country') : $order->country }}" id="country" placeholder="Enter your country" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') ? old('address') : $order->street_address }}" id="address" placeholder="Enter your address" required>
                    </div>
                    <div class="mb-3">
                        <label for="apartment" class="form-label">Apartment</label>
                        <input type="text" name="apartment_suite_etc" class="form-control" value="{{ old('apartment') ? old('apartment') : $order->apartment_suite_etc }}" id="apartment" placeholder="Enter your apartment">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') ? old('phone') : $order->phone }}" id="phone" placeholder="Enter your phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control" value="{{ old('total') ? old('total') : $order->total }}" id="total" placeholder="Enter the total" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" value="{{ old('status') ? old('status') : $order->status }}" id="status" placeholder="Enter the status" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
