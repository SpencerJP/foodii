@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>User Type</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->getUserTypeToString()}}</td>

                        <td>

                            <a class="btn btn-small btn-success" href="{{ route("users.show", $value->id) }}">Details</a>

                            <a class="btn btn-small btn-info" href="{{ route("users.edit", $value->id) }}">Edit</a>

                            <a class="btn">
                            <form action="{{ route("users.destroy", $value->id)}}" method="POST">
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
