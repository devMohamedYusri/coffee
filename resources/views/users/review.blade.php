@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Review</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Review</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <form action="{{ route('coffee.user.review.store') }}"
                        method="post"class="billing-form ftco-bg-dark p-3 p-md-5">
                        @CSRF
                        <h3 style="color:white;"class="mb-4 billing-heading">Review</h3>
                        <div class="row align-items-end">
                            <input type="text" name="type_of_service" id="name" value="{{ $type }}"
                                class="form-control" hidden>
                            <input type="text" name="order_id" value="{{$id}}"class="form-control"hidden>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}"class="form-control"hidden>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="content" id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <p><button name="submit" type="submit" class="btn btn-primary py-3 px-4">submit
                                                Review</button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
