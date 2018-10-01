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
                @foreach($quizresults as $key => $value)
                    <tr>
                      <?php $restaurant = App\Models\Restaurant::find($value->restaurant_id) ?>
                        <td>{{ $restaurant->restaurant_image }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td>{{ $restaurant->phone_number }}</td>
                        <td>{{ $restaurant->rating }}</td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
