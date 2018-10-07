@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
          <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
            <h2 class="display-4 font-italic">{{ $question->questionvalue }}</h2>
            </div>
            </div>
          @foreach($question->answers as $key => $answer)
            <form action="{{ route('quiz.answerquestion') }}" method="POST">
                @csrf
            <div class="col-md-12">
            <div class="card-body d-flex flex-column align-items-start">
		        <input type="hidden" value="{{$answer->id}}" name="answer_id" />
                <button class="btn btn-default btn-lg btn-block">{{$answer->answervalue}}</button>
        	</div>
            </div>
            </form>
          @endforeach

          @if(Config::get('quizoptions.debug_mode'))
            @include("quiz.debug")
          @endif
      </div>
    </div>
</div>
@endsection
