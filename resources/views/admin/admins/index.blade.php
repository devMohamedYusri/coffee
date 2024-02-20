@extends('layouts.admin')

@section('content')
<h1>current admins</h1>
<a class="btn btn-primary" href="{{route('admin.admins.create')}}">Create Admin</a>
<br><br>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($admins->count() > 0)
            @foreach ($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.admins.edit',$admin->id)}}">Edit</a></td>
                <form method="post"action="{{route('admin.admins.destroy',$admin->id)}}">
                @csrf
                @method('delete')
                <td><button type="submit" name="submit"class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
            @endforeach
            @else
                <div>No Admins</div>
            @endif
            </tbody>
    </table>
</div>

@endsection
