@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <p>Result: {{App\Models\Restaurant::find($quizresult->restaurant_id)->name}}</p>
        <p>{{$quizresult->quiz->restaurants}}</p>
      </div>
    </div>
</div>
@endsection
