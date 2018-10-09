@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

      <h1 class="display-4"><a href="{{ route('quiz.startQuiz') }}"><img src="/images/start_button1.png"></a></h1>
    </div>

    <div class="card-deck mb-3 text-center">

          <a href="{{ route('preferences.index') }}"><img src="/images/preference_button.png"></a>
          <a href="{{ route('history') }}"><img src="/images/history.png "></a>
    </div>

</div>
@endsection
