@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <a href="{{ route('quiz.startQuiz') }}">
            <img src="/images/start_button1.png" >
            </a>
      </div>
    </div>
</div>
@endsection
