@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">
                    <div id="container">
                        <button onclick="location.href= '{{ route('preferences.index') }}'" type="button" id="button1">Preferences</button>
                        <!--<a href="https://www.w3schools.com"></a> -->
                        <button onclick="location.href= '{{ url('usershistory') }}'" type="button" id="button2">User's History</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
