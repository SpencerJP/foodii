@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">

                <div class="text-centre">
                <p class="pref">Select your <mark>preferences</mark> for a more personalised result:</p>
                </div>

            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}
                <div class="form-group">
                    {{ Form::label('diet', 'Dietary Mode') }} <br/>
                    {{ Form::checkbox('dietary_mode[]', 'Vegan', false)}} Vegan<br/>  
                    {{ Form::checkbox('dietary_mode[]', 'Vegetarian', false)}} Vegetarian<br/>  
                    {{ Form::checkbox('dietary_mode[]', 'Halal', false)}} Halal<br/>  
                    {{ Form::checkbox('dietary_mode[]', 'Lactose Intolerant', false)}} Lactose Intolerant<br/>  
                    {{ Form::checkbox('dietary_mode[]', 'Gluten-free', false)}} Gluten-free<br/> 
                    {{ Form::checkbox('dietary_mode[]', 'Nut Allergy', false)}} Nut Allergy  <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('price', 'Price Range') }} <br/>
                    {{ Form::radio('preferred_price_range', '$', false)}} $<br/>
                     {{ Form::radio('preferred_price_range', '$$', false)}} $$<br/>
                     {{ Form::radio('preferred_price_range', '$$$', false)}} $$$<br/>
                </div>

                <div class="form-group">
                    {{ Form::label('radius', 'Radius Size') }} <br/>
                    {{ Form::radio('preferred_radius_size', 'less than 5km', false)}} less than 5km<br/>
                    {{ Form::radio('preferred_radius_size', 'less than 10km', false)}} less than 10km<br/>
                    {{ Form::radio('preferred_radius_size', 'stores that deliver', false)}} stores that deliver<br/>
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

        </div>
    </div>
</div>
@endsection
