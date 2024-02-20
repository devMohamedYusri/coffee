@extends('layouts.admin')
@section('content')
<div class="container-flex">
    <h1>DashBoard</h1>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Admins')}}</h5>
                <p>{{$admins}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Users')}}</h5>
                <p>{{$users}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Products')}}</h5>
                <p>{{$products}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Bookings')}}</h5>
                <p>{{$bookings}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Orders')}}</h5>
                <p>{{$orders}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Drinks')}}</h5>
                <p>{{$drinks}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Desserts')}}</h5>
                <p>{{$desserts}}</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="container-sm border p-3 mb-3">
                <h5 class="card-title">{{__('Reviews')}}</h5>
                <p>{{$reviews}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
