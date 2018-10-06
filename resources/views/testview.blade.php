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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
