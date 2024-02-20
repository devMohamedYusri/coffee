@extends('layouts.admin')

@section('content')
<h1>Current Bookings</h1>
<br>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count() > 0)
            @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->user_id}}</td>
                <td>{{$book->first_name}}</td>
                <td>{{$book->last_name}}</td>
                <td>{{$book->phone}}</td>
                <td>{{$book->date}}</td>
                <td>{{$book->time}}</td>
                <td>{{$book->message}}</td>
                <td>{{$book->status}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.bookings.edit',$book->id)}}">Edit</a></td>
                <td>
                    <form method="post" action="{{route('admin.bookings.destroy',$book->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="11">No books</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
