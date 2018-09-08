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
        </div>
    </div>
</div>
@endsection