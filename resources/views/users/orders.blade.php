@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">My orders</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My
                                orders</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table table-dark">
                            <thead class="thead warnning">
                                <tr class="text-center">\
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>City</th>
                                    <th>Street Address</th>
                                    <th>Email</th>
                                    <th>Total Price</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                        <tr class="text-center">
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <h3>{{ $order->first_name }}</h3>
                                            </td>

                                            <td>
                                                <h3>{{ $order->last_name }}</h3>
                                            </td>

                                            <td>{{ $order->city }}</td>

                                            <td>{{ $order->street_address }}</td>

                                            <td>{{ $order->email }}</td>

                                            <td>{{ $order->total }}</td>
                                            @if ($order->status == 'booked')
                                                <td><a href="{{ route('coffee.user.review', [$order->id, 'order']) }}"
                                                        class="btn btn-success">add review</a></td>
                                            @else
                                                <td>
                                                    <p>{{ $order->status }}</p>
                                                </td>
                                            @endif
                                        </tr><!-- END TR-->
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No orders untill now</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
