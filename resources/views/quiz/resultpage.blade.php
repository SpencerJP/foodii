@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <p>Result: {{App\Models\Restaurant::find($quizresult->restaurant_id)->name}}</p>

        @if(Config::get('quizoptions.debug_mode'))
          @include("quiz.debug")
        @endif
      </div>
    </div>
</div>
@endsection
