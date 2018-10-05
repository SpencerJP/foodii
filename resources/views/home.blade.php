@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="container">
                        <button onclick="location.href= '{{ route('preferences.index') }}'" type="button" id="button1">Preferences</button>
                        <button onclick="location.href= '{{ url('usershistory') }}'" type="button" id="button2">User's History</button>
        					    <a href="{{ route('quiz.startQuiz') }}">
        				        	<img src="/images/start_button1.png" >
        				    	</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
