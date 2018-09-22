@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card-body">

                <div class="text-centre">
                <p class="pref">Select your preferences for a more personalised result:</p>
                </div>

            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'POST')) }}
                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }} <br/>
                    {{ Form::checkbox('dietary_mode', '1', null)}} Vegan
                    {{ Form::checkbox('dietary_mode', '2', null)}} Vegetarian
                    {{ Form::checkbox('dietary_mode', '3', null)}} Halal
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_price_range', 'Price Range') }} <br/>
                    {{ Form::checkbox('preferred_price_range', '1', null)}} $
                     {{ Form::checkbox('preferred_price_range', '2', null)}} $$
                     {{ Form::checkbox('preferred_price_range', '3', null)}} $$$
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Radius Size') }} <br/>
                    {{ Form::checkbox('preferred_radius_size', '1', null)}} less than 5km
                    {{ Form::checkbox('preferred_radius_size', '2', null)}} less than 10km
                    {{ Form::checkbox('preferred_radius_size', '3', null)}} stores that deliver
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

        </div>
    </div>
</div>
@endsection
