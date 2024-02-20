@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Update book</h2>
                <form method="post" action="{{ route('admin.bookings.update', $book->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') ? old('first_name') : $book->first_name }}" id="first_name" placeholder="Enter First Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ? old('last_name') : $book->last_name }}" id="last_name" placeholder="Enter Last Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') ? old('phone') : $book->phone }}" id="phone" placeholder="Enter Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') ? old('date') : $book->date }}" id="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" value="{{ old('time') ? old('time') : $book->time }}" id="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control" id="message" placeholder="Enter Message" required>{{ old('message') ? old('message') : $book->message }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" value="{{ old('status') ? old('status') : $book->status }}" id="status" placeholder="Enter Status" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
