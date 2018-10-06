@extends('layouts.app')

@section('content')



<div class="container">
	<section class="jumbotron text-center">
	<!--set image here-->
	<h1 class="jumbotron-heading">Edit {{ $restaurant->name }}</h1>
	</section>
	{{ Form::model($restaurant, array('route' => array('restaurants.update', $restaurant->id), 'method' => 'PUT')) }}

	<div class="row featurette">
	  <div class="col-md-7">
		<h2 class="featurette-heading">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, array('class' => 'form-control')) }}
			</div>
		</h2>
		<p class="lead">
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', null, array('class' => 'form-control')) }}
			</div>
		</p>
	  </div>

	  <div class="col-md-5">
		{{ Form::label('restaurant_image', 'Image URL') }}
		{{ Form::text('restaurant_image', null, array('class' => 'form-control')) }}
	  </div>
	</div>

	<p class="sub">
	<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', null, array('class' => 'form-control')) }}
	</div>
	</p>
	<p class="sub">Mon-Sat : 9am - 10pm , Sun : 9am - 12am.</p>
	<p class="sub">
		{{ Form::label('phone_number', 'Phone #') }}
		{{ Form::text('phone_number', null, array('class' => 'form-control')) }}
	</p>
	<p class="sub"><Strong>Rating:</strong>{{ $restaurant->rating }}</p>
	{{ Form::submit('Confirm', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
	<hr class="featurette-divider">
</div>
@endsection
