@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">update Product</h2>
                <form method="post" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="{{old('title')?old('title'):$product->title}}"class="form-control" id="title" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description"  col="10" raw="10" class="form-control" id="description" placeholder="Enter description" required>{{old('description')?old('description'):$product->description}} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" value="{{old('price')?old('price'):$product->price}}" class="form-control" id="price" placeholder="Enter price" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img src="{{ asset($product->image)}}" alt="Product image" width="200">
                        <input type="hidden" name="old_image" value="{{ $product->image }}">
                        <input type="file" name="image" class="form-control" id="image" placeholder="Enter image URL">
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID</label>
                        <select name="category_id" class="form-select" id="category_id" required>
                            <option selected value="{{ $product->category_id}}">{{$categories[$product->category_id-1]['name']}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
