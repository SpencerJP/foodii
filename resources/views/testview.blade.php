@extends('layouts.app')

@section('content')
<div id="related_links">
    <ul>
        <li>
            <a href='/home'>Quiz</a>
        </li>

        <li>
            <a href='/usershistory'>User's History</a>
        </li>

        <li>
            <a href='preferences'>Preferences</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">Dashboard</div>
				<a href="http://127.0.0.1:8000/">
				<img src="/images/start_button1.png" >
				</a>
                <div class="card-body">
                    @if (session('status'))
                    @endif

                    testView
                    @if( Auth::check() )
						
                        Your user type is: {{ Auth::user()->getUserTypeToString() }}
                    @endif
=======
                <div class="card-header">User's Dashboard</div>
                    <ul>
                        <li>
                            <a href='/home'>Quiz</a>
                        </li>

                        <li>
                            <a href='usershistory'>User's History</a>
                        </li>

                        <li>
                            <a href='preferences'>Preferences</a>
                        </li>
                    </ul>
                <div class="card-body">

>>>>>>> development
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
