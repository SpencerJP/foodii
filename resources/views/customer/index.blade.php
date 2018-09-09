@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }}
                    <br/>
                    {{ Form::radio('Diet', '1') }} Vegan
                    <br/>
                    {{ Form::radio('Diet', '2') }} Vegetarian
                    <br/>
                    {{ Form::radio('Diet','3') }} Meat Lover
                    <br/>
                    {{ Form::radio('Diet','4') }} Halal
                    <br/>
                    {{ Form::radio('Diet','5') }} Seafood
                    <br/>
                    {{ Form::radio('Diet','6') }} Gluten-free
                    <br/>
                    {{ Form::radio('Diet', '7') }} Lactose intolerant
                    
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_price_range', 'Preferred Price Range') }}
                    <br/>
                    {{ Form::radio('Price', '1') }} $
                    <br/>
                    {{ Form::radio('Price', '2') }} $$
                    <br/>
                    {{ Form::radio('Price','3') }} $$$
                    <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Preferred Radius Size') }}
                    <br/>
                    {{ Form::radio('Distance', '1') }} Walking Distance
                    <br/>
                    {{ Form::radio('Distance', '2') }} Short ride
                    <br/>
                    {{ Form::radio('Distance','3') }} Comfortable drive
                    <br/>
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
