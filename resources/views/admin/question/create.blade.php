@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card-body">
            {{ Form::open(array('url' =>  route("questions.store"), 'method' => 'POST')) }}

                <div class="form-group">
                    {{ Form::label('questionvalue', 'Question') }}
                    {{ Form::text('questionvalue', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('weight', 'Weight') }}
                    {{ Form::text('weight', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection