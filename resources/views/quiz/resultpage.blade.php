@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <p>Result: {{$restaurant->name}}</p>
      </div>
    </div>
</div>
@endsection
