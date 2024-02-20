@extends('layouts.admin')

@section('content')
<h1>current orders</h1>
<br>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Last Name</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Address</th>
                <th scope="col">Apartment</th>
                <th scope="col">Phone</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($orders->count() > 0)
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->last_name}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->country}}</td>
                <td>{{$order->street_address}}</td>
                <td>{{$order->apartment_suite_etc}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->status}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.orders.edit',$order->id)}}">Edit</a></td>
                <form method="post" action="{{route('admin.orders.destroy',$order->id)}}">
                @csrf
                @method('delete')
                <td><button type="submit" name="submit" class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="12">No Admins</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
