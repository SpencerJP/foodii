@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            {{ Form::model($user, array('route' =>  array('users.update', $user->id), 'method' => 'PUT')) }}

                <div class="form-group">                
                    {{ Form::select('user_type', array('customer' => 'Customer', 'restaurant_owner' => 'Restaurant Owner')) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('dietary_mode', 'Dietary Mode') }}
                    {{ Form::text('dietary_mode', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_price_range', 'Preferred Price Range') }}
                    {{ Form::text('preferred_price_range', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('preferred_radius_size', 'Preferred Radius Size') }}
                    {{ Form::text('preferred_radius_size', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Edit the User Details!', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection