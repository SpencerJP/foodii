@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
          <h2>{{ $question->questionvalue }}</h2>
          @foreach($question->answers->get() as $key => $answer)
            <form action="{{ route('quiz.answerquestion') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$answer->id}}" name="answer_id" />
                <button class="btn btn-small btn-danger">{{$answer->answervalue}}</button>
            </form>
          @endforeach
      </div>
    </div>
</div>
@endsection
