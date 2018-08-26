@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Showing {{ $restaurant->name }}</h1>

            <div class="jumbotron text-center">
                <h2>{{ $restaurant->name }}</h2>
                <p>
                    <strong>Address:</strong> {{ $restaurant->address }}<br>
                    <strong>Description:</strong> {{ $restaurant->description }}<br>
                    <strong>Rating:</strong> {{ $restaurant->rating }}<br>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection