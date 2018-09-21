@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card-body">
            
                <section class="jumbotron text-center">
	                <div class="container">
	                    <h1 class="jumbotron-heading">Dashboard</h1>
	  
	                    <p class="lead text-muted">Here you can view and edit your preferences based on multiple factors.</p>
	                </div>
	            </section>  

                <div class="text-centre">
                <p class="pref">Select your preferences for a more personalised result:</p>
                </div>

            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}
                <div class="form-group">
                  {{ Form::label('dietary_mode', 'Dietary Mode') }} <br/>
                    {{ Form::checkbox('Vegan', null, null, array('id'=>'dietary_mode'))}} Vegan
                    {{ Form::checkbox('Vegetarian', null, null, array('id'=>'dietary_mode'))}} Vegetarian
                    {{ Form::checkbox('Halal', null, null, array('id'=>'dietary_mode'))}} Halal
                </div>

                <div class="form-group">
                {{ Form::label('preferred_price_range', 'Price Range') }} <br/>
                {{ Form::checkbox('$', null, null, array('id'=>'preferred_price_range'))}} $
                {{ Form::checkbox('$$', null, null, array('id'=>'preferred_price_range'))}} $$
                {{ Form::checkbox('$$$', null, null, array('id'=>'preferred_price_range'))}} $$$
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Radius Size') }} <br/>
                    {{ Form::checkbox('5km', null, null, array('id'=>'preferred_radius_size'))}} less than 5km
                    {{ Form::checkbox('10km', null, null, array('id'=>'preferred_radius_size'))}} less than 10km
                    {{ Form::checkbox('deliver', null, null, array('id'=>'preferred_radius_size'))}} stores that deliver
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

        </div>
    </div>
</div>
@endsection
