@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

      <h1 class="display-4"><a href="{{ route('quiz.startQuiz') }}"><img src="/images/start_button.png" onmouseover="this.src='/images/start_hover.png'" onmouseout="this.src='/images/start_button.png'" style="box-shadow: 6px 8px 3px 0px LightSteelBlue"></a></h1>
    </div>

    <div class="text-center">

          <a href="{{ route('preferences.index') }}"><img src="/images/preference_blue.png" onmouseover="this.src='/images/preference_hover.png'" onmouseout="this.src='/images/preference_blue.png'" width="230" height="85" ></a>
          
          <a href="{{ route('history') }}"><img src="/images/history_blue.png" onmouseover="this.src='/images/history_hover.png'" onmouseout="this.src='/images/history_blue.png'" width="230" height="85"></a>
          
    </div>

</div>
@endsection
