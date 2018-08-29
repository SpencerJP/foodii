@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        
            <h1>Edit {{ $restaurant->name }}</h1>
                  
            {{ Form::model($restaurant, array('route' => array('restaurants.update', $restaurant->id), 'method' => 'PUT')) }}
            
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
            
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, array('class' => 'form-control')) }}
                </div>
            
                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description', null, array('class' => 'form-control')) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('rating', 'Rating') }}
                    {{ Form::number('rating', null, array('class' => 'form-control')) }}
                </div>
               
            
                {{ Form::submit('Edit the Restaurant!', array('class' => 'btn btn-primary')) }}
            
            {{ Form::close() }}
      </div>
    </div>
</div>
@endsection