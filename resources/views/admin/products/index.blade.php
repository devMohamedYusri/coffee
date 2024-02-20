@extends('layouts.admin')

@section('content')
<h1>Current Products</h1>
<a class="btn btn-primary" href="{{ route('admin.products.create') }}">Create Product</a>
<br><br>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset($product->image) }}" alt="category_img" class="img-thumbnail img-fluid">
                </td>
                <td>{{ $product->name }}</td>
                <td><a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('admin.products.destroy', $product->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8">No products</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
