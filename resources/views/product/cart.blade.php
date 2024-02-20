@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span>
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
                                    <th>&nbsp;</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($cart_products) > 0)
                                    @foreach ($cart_products as $product)
                                        <tr class="text-center">
                                            <td class="product-remove">
                                                <form action="{{ route('coffee.product.removeCart', $product->cart_id) }}"
                                                    method="post">
                                                    @CSRF
                                                    @method('delete')
                                                    <button  style="width:50px;" type="submit">
                                                        <span style="width:30px;" class="ion-ios-close">Del</span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image:url({{ asset($product->image) }});"> </div>
                                            </td>

                                            <td>
                                                <h3>{{ $product->title }}</h3>
                                                <p style="color:gray;">{{ $product->description }}</p>
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input disabled type="text" name="quantity"
                                                        class="quantity form-control input-number"
                                                        value="{{ $product->quantity }}" min="1" max="100">
                                                </div>
                                            </td>
                                            <td>{{ $product->total }}</td>
                                        </tr><!-- END TR-->
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Products</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span> ${{$totalPrice}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{$totalPrice}}</span>
                        </p>
                    </div>
                    <form action="{{route('coffee.product.prepare-checkout')}}" method="post">
                    @csrf
                    <input type="text" name="total" value="{{$totalPrice}}" hidden>
                    <p class="text-center"><button name="submit" value=""type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                    </p>
                </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <br>
                    <h2 class="mb-4" style='color:white'>Related products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @if (count($discover) > 0)
                    @foreach ($discover as $discover_product)
                        <div class="col-md-3">
                            <div class="menu-entry">
                                <a href="{{ route('coffee.product.show', $discover_product->id) }}" class="img"
                                    style="background-image: url({{ asset($discover_product->image) }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="{{ route('coffee.product.show', $discover_product->id) }}">{{ $discover_product->title }}</a></h3>
                                    <p>{{ $discover_product->description }}</p>
                                    <p class="price"><span>${{ $discover_product->price }}</span></p>
                                    <p><a href="{{ route('coffee.product.show', $discover_product->id) }}"
                                            class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>No related products found</div>
                @endif
            </div>
        </div>
    </section>
@endsection
