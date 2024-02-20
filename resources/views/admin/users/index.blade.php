@extends('layouts.admin')

@section('content')

<h1>Current Users</h1>
<a class="btn btn-primary" href="{{route('admin.users.create')}}">Create User</a>
<br><br>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Avatar</th>
                <th scope="col">Number of Orders</th>
                <th scope="col">Number of Bookings</th>
                <th scope="col">Total Spent</th>
                <th scope="col">Points</th>
                <th scope="col">Number of Reviews</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->postal_code }}</td>
                        <td><img  src="{{ asset($user->avatar) }}" alt="Avatar" class="img-thumbnail" ></td>
                        <td>{{ $user->number_of_orders }}</td>
                        <td>{{ $user->number_of_bookings }}</td>
                        <td>{{ $user->total_spent }}</td>
                        <td>{{ $user->points }}</td>
                        <td>{{ $user->number_of_reviews }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="18">No Users available</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
