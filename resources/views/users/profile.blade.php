@extends('layouts.app')

@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ Auth::user()->name }}</h1>
                        <p class="breadcrumbs">
                            <span class="mr-2"><a href="index.html">Home</a></span>
                            <span>{{ Auth::user()->name }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __(Auth::user()->name) }}</div>
                    <div class="card-body">
                        <img class="img-thumbnail " style="width: 100%; height:500px"
                            src="{{ asset(Auth::user()->avatar) }}">
                        <div class="text-center">
                            <h2 class="mt-3">{{ Auth::user()->name }}</h2>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="mt-2">statistics </h2>
                                <ul>
                                    <li><strong>Number of Orders:</strong>
                                        {{ Auth::user()->number_of_orders ?? 'Not provided' }}</li>
                                    <li><strong>Number of Bookings::</strong> 
                                        {{ Auth::user()->number_of_bookings }}</li>
                                    <li><strong>number of reviews:</strong>
                                        {{ Auth::user()->number_of_reviews ?? 'Not provided' }}</li>
                                    <li><strong>points:</strong>
                                        {{ Auth::user()->points ?? 'Not provided' }}</li>
                                    <li><strong>Total Spent::</strong> 
                                        {{ Auth::user()->total_spent ?? 'Not provided' }} </li>
                                </ul>
                            </div>


                            <div class="col-md-6">
                                <h4>Contact Information</h4>
                                <ul>
                                    <li><strong>Address:</strong> {{ Auth::user()->profile->address ?? 'Not provided' }}
                                    </li>
                                    <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                                    <li><strong>Phone:</strong> {{ Auth::user()->profile->phone ?? 'Not provided' }}</li>
                                </ul>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                           
                            <div class="col-md-6">
                                <h4>Additional Information:</h4>
                                <ul>
                                    <li><strong>country:</strong> {{ Auth::user()->country ?? 'Not provided' }}</li>
                                    <li><strong>city:</strong> {{ Auth::user()->city }}</li>
                                    <li><strong>postal Code:</strong> {{ Auth::user()->postal_code }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- User Profile -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ftco-animate">
                    <div class="card">
                        <div class="card-header">User Profile</div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="photo" alt="photo" class="rounded-circle" style="width: 150px;">
                                <h2 class="mt-2">name</h2>
                                <p class="text-muted">Number of Orders: orders </p>
                                <p class="text-muted">Number of Bookings:</p>
                                <p class="text-muted">Contact Information:</p>
                                <p class="text-muted">email</p>
                                <p class="text-muted">phone</p>
                                <p class="text-muted">address</p>
                                <p class="text-muted">Additional Information:</p>
                                <p class="text-muted">Birthdate: birhtday</p>
                                <p class="text-muted">Membership Level:membership</p>
                                <p class="text-muted">Total Spent:total spent</p>
                                <p class="text-muted">Loyalty Points: points</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
