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
                    {{ Form::label('dietary_mode', 'Dietary Mode') }}
                    <br/>
                    {{ Form::radio('Diet', '1') }} Vegan
                    <br/>
                    {{ Form::radio('Diet', '2') }} Vegetarian
                    <br/>
                    {{ Form::radio('Diet','3') }} Halal
                    <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('allergies', 'Allergies') }}
                    <br/>
                    {{ Form::radio('allergies', '1') }} Lactose
                    <br/>
                    {{ Form::radio('allergies', '2') }} Gluten
                    <br/>
                    {{ Form::radio('alergies','3') }} Nuts
                    <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_price_range', 'Preferred Price Range') }}
                    <br/>
                    {{ Form::radio('price', '1') }} $
                    <br/>
                    {{ Form::radio('price', '2') }} $$
                    <br/>
                    {{ Form::radio('price','3') }} $$$
                    <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Preferred Radius Size') }}
                    <br/>
                    {{ Form::radio('distance', '1') }} less than 5km
                    <br/>
                    {{ Form::radio('distance', '2') }} less than 10km
                    <br/>
                    {{ Form::radio('distance','3') }} Stores that deliver
                    <br/>
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
