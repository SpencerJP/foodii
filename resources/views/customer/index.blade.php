@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>History</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td></td>
                        <td>Restaurant Name</td>
                        <td>Address</td>
                        <td>Phone #</td>
                        <td>Rating</td>
                        <td>Quiz Taken</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($quizresult as $key => $value)
                    <tr>
                        <td>{{ $value->restaurant_image }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone_number }}</td>
                        <td>{{ $value->rating }}</td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
