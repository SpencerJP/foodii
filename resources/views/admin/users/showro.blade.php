@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Showing {{ $user->name }}</h1>

            <div class="jumbotron text-center">
                <h2>{{ $user->name }}</h2>
                <p>
                    <strong>ID:</strong> {{ $user->id }}<br>
                    <strong>Name:</strong> {{ $user->name }}<br>
                    <strong>Email:</strong> {{ $user->email }}<br>
                    <strong>User Type:</strong> {{ $user->getUserTypeToString() }}<br>
                    <strong>Dietary Mode:</strong> {{ $user->preferences->dietary_mode }}<br>
                    <strong>Preferred Price Range:</strong> {{ $user->preferences->preferred_price_range }}<br>
                    <strong>Preferred Radius Size:</strong> {{ $user->preferences->preferred_radius_size}}<br>    
                </p>
                
                               
            </div>
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
                    @foreach ($user->restaurants as $key => $value)                                        
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->rating }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>
</div>
@endsection