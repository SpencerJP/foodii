@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Auth::user()->isAdmin())
    <a href="{{ route('users.index') }}"><h1>Users</h1></a>
    <a href="{{ route('restaurants.index') }}"><h1>Restaurants</h1></a>
    <a href="{{ route('questions.index') }}"><h1>Questions</h1></a>
  @elseif(\Auth::user()->isRestaurantOwner())
    <a href="{{ route('restaurants.index') }}"><h1>Restaurants</h1></a>
  @endif
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><a href="{{ route('quiz.startQuiz') }}"><img src="/images/start_button1.png"></a></h1>
    </div>

    <div class="card-deck mb-3 text-center">
        <div class="card mb-6 box-shadow">

          <a href="{{ route('preferences.index') }}"><img src="/images/preference_button.png"></a>


        </div>
        <div class="card mb-6 box-shadow">

          <a href="{{ url('usershistory') }}"><img src="/images/history.png "></a>
        </div>
    </div>
</div>
@endsection
