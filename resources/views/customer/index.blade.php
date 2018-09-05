@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }}
                    {{ Form::text('dietary_mode', null, array('class' => 'form-control')) }}
                    {{ Form::radio('Vegan', '1') }}
                    {{ Form::radio('Vegetarian', '2') }}
                    {{ Form::radio('Meat Lover', '3') }}
                    {{ Form::radio('Halal', '4') }}
                    {{ Form::radio('Seafood', '5') }}
                </div>

                <div class="form-group">
                  <!-- hello -->
                    {{ Form::label('preferred_price_range', 'Preferred Price Range') }}
                    {{ Form::text('preferred_price_range', null, array('class' => 'form-control')) }}
                    {{ Form::radio('$', '1') }}
                    {{ Form::radio('$$', '2') }}
                    {{ Form::radio('$$$', '3') }}
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Preferred Radius Size') }}
                    {{ Form::text('preferred_radius_size', null, array('class' => 'form-control')) }}
                    {{ Form::radio('Walking distance', '1') }}
                    {{ Form::radio('Short ride', '2') }}
                    {{ Form::radio('Comfortable drive', '3') }}
                </div>

                {{ Form::submit('Edit the Preference!', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
