@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">

                <div class="text-centre">
                <p class="pref">Select your <mark>preferences</mark> for a more personalised result:</p>
                </div>

            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'POST')) }}
                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }} <br/>
                    {{ Form::checkbox('dietary_mode', '1', false)}} Vegan<br/>
                    {{ Form::checkbox('dietary_mode', '2', false)}} Vegetarian<br/>
                    {{ Form::checkbox('dietary_mode', '3', false)}} Halal<br/>
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_price_range', 'Price Range') }} <br/>
                    {{ Form::checkbox('preferred_price_range', '1', false)}} $<br/>
                     {{ Form::checkbox('preferred_price_range', '2', false)}} $$<br/>
                     {{ Form::checkbox('preferred_price_range', '3', false)}} $$$<br/>
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Radius Size') }} <br/>
                    {{ Form::checkbox('preferred_radius_size', '1', false)}} less than 5km<br/>
                    {{ Form::checkbox('preferred_radius_size', '2', false)}} less than 10km<br/>
                    {{ Form::checkbox('preferred_radius_size', '3', false)}} stores that deliver<br/>
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

        </div>
    </div>
</div>
@endsection