@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }}
                    {{ Form::text('dietary_mode', null, array('class' => 'form-control')) }}
                    {{ Form::radio('Diet', 'Vegan', '1') }}
                    {{ Form::radio('Diet', 'Vegetarian', '2') }}
                    {{ Form::radio('Diet', 'Meat Lover', '3') }}
                    {{ Form::radio('Diet', 'Halal', '4') }}
                    {{ Form::radio('Diet', 'Seafood', '5') }}
                </div>

                <div class="form-group">
                  <!-- hello -->
                    {{ Form::label('preferred_price_range', 'Preferred Price Range') }}
                    {{ Form::text('preferred_price_range', null, array('class' => 'form-control')) }}
                    {{ Form::radio('Price','$', '1') }}
                    {{ Form::radio('Price','$$', '2') }}
                    {{ Form::radio('Price','$$$', '3') }}
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Preferred Radius Size') }}
                    {{ Form::text('preferred_radius_size', null, array('class' => 'form-control')) }}
                    {{ Form::radio('Radius','Walking distance', '1') }}
                    {{ Form::radio('Radius','Short ride', '2') }}
                    {{ Form::radio('Radius','Comfortable drive', '3') }}
                </div>

                {{ Form::submit('Edit the Preference!', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
