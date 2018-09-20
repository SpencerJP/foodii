@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <p>Result: {{App\Models\Restaurant::find($quizresult->restaurant_id)->name}}</p>
        @if(Config::get('quizoptions.debug_mode'))
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
              @foreach($quizresult->quiz->potentialRestaurants as $key => $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->address }}</td>
                      <td>{{ $value->rating }}</td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        @endif
      </div>
    </div>
</div>
@endsection
