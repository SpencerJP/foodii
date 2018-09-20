@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">
                    <div id="container">
                        <button type="button" id="button1">I'm feeling lucky</button>
                        <!--<a href="https://www.w3schools.com"></a> -->
                        <button value="Refresh Page" onClick="window.location.reload()" id="button2">Refresh the page</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
