@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Update Admin</h2>
                <form method="post"action="{{ route('admin.admins.update',$admin->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')?old('name'):$admin->name; }}"id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control"value="{{old('email')?old('email'):$admin->email; }}" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" value="{{old('password')?old('password'):$admin->password; }}" id="password" placeholder="Enter your password"
                            required>
                    </div>
                    <button type="submit" name="submit"class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
