@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">My bookings</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My
                                bookings</span>
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
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <th>phone</th>
                                    <th>message</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($books) > 0)
                                    @foreach ($books as $book)
                                        <tr class="text-center">
                                            <td>{{ $book->id }}</td>
                                            <td>
                                                <h3>{{ $book->first_name }}</h3>
                                            </td>

                                            <td>
                                                <h3>{{ $book->last_name }}</h3>
                                            </td>

                                            <td>{{ $book->date }}</td>

                                            <td>{{ $book->time }}</td>

                                            <td>{{ $book->phone }}</td>

                                            <td>{{ $book->message }}</td>
                                            @if ($book->status == 'booked')
                                                <td><a href="{{ route('coffee.user.review', [$book->id,'booking']) }}"
                                                        class="btn btn-success">add review</a></td>
                                            @else
                                                <td>
                                                    <p>{{ $book->status }}</p>
                                                </td>
                                            @endif

                                        </tr><!-- END TR-->
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No bookings untill now</td>
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
