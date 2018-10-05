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
                    {{ Form::checkbox('dietary_mode[]', 'Vegan', in_array("Vegan", $dietary_mode) )}} Vegan<br/>
                    {{ Form::checkbox('dietary_mode[]', 'Vegetarian', in_array("Vegetarian", $dietary_mode) )}} Vegetarian<br/>
                    {{ Form::checkbox('dietary_mode[]', 'Halal', in_array("Halal", $dietary_mode) )}} Halal<br/>
                    {{ Form::checkbox('dietary_mode[]', 'Lactose Intolerant', in_array("Lactose Intolerant", $dietary_mode) )}} Lactose Intolerant<br/>
                    {{ Form::checkbox('dietary_mode[]', 'Gluten-free', in_array("Gluten-free", $dietary_mode) )}} Gluten-free<br/>
                    {{ Form::checkbox('dietary_mode[]', 'Nut Allergy', in_array("Nut Allergy", $dietary_mode) )}} Nut Allergy  <br/>
                </div>

                <div class="form-group">
                    {{ Form::label('price', 'Price Range') }} <br/>
                    {{ Form::radio('preferred_price_range', '$', ($preferred_price_range == "$" ))}} $<br/>
                     {{ Form::radio('preferred_price_range', '$$', ($preferred_price_range == "$$"))}} $$<br/>
                     {{ Form::radio('preferred_price_range', '$$$', ($preferred_price_range == "$$$"))}} $$$<br/>
                </div>

                <div class="form-group">
                    {{ Form::label('radius', 'Radius Size') }} <br/>
                    {{ Form::radio('preferred_radius_size', 'less than 5km', ($preferred_radius_size == "less than 5km") )}} less than 5km<br/>
                    {{ Form::radio('preferred_radius_size', 'less than 10km', ($preferred_radius_size == "less than 10km") )}} less than 10km<br/>
                    {{ Form::radio('preferred_radius_size', 'stores that deliver', ($preferred_radius_size == "stores that deliver") )}} stores that deliver<br/>
                </div>

                {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

            <h1>History</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td></td>
                        <td>Restaurant Name</td>
                        <td>Address</td>
                        <td>Phone #</td>
                        <td>Rating</td>
                        <td>Quiz Taken</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($quizresult as $key => $value)
                    <tr>
                        <td>{{ $value->restaurant_image }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone_number }}</td>
                        <td>{{ $value->rating }}</td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
