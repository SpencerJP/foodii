@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <a class="btn btn-small btn-success" href="{{ route('quiz.startQuiz') }}">Begin Quiz!</a>
      </div>
    </div>
</div>
@endsection
