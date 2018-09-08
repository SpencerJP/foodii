@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card-body">
            {{ Form::open(array('url' =>  route("answers.store", $question->id), 'method' => 'POST')) }}

                <div class="form-group">
                    {{ Form::label('answervalue', 'Answer') }}
                    {{ Form::text('answervalue', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection