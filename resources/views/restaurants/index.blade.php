@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Restaurant Name</td>
                        <td>Address</td>
                        <td>Rating</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->rating }}</td>

                        <td>

                          <a class="btn btn-small btn-success" href="{{ route("restaurants.show", $value->id) }}">Details</a>
                          <a class="btn btn-small btn-success" href="{{ route("tags.restaurantTagIndex", $value->id)}}">View Tags</a>

                          <a class="btn btn-small btn-info" href="{{ route("restaurants.edit", $value->id) }}">Edit</a>

                          <a class="btn">
                          <form action="{{ route("restaurants.destroy", $value->id)}}" method="POST">
                             @method('Delete')
                             @csrf
                             <button class="btn btn-small btn-danger">Delete</button>
                          </form>
                          </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
