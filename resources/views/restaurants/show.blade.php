@extends('layouts.app')

@section('content')
<div class="container">
	<section class="jumbotron">
	<!--set image here-->
	</section>	
	<div class="row featurette">
	  <div class="col-md-7">
		<h2 class="featurette-heading">{{ $restaurant->name }}</h2>
		<p class="lead">{{ $restaurant->description }}</p>
	  </div>
	  <div class="col-md-5">
		{{ $restaurant->restaurant_image }}
	  </div>
	  
	</div>
		<p class="sub">{{ $restaurant->address }}</p>
		<p class="sub">Mon-Sat : 9am - 10pm , Sun : 9am - 12am.</p>
		<p class="sub">{{ $restaurant->phone_number }}</p>
		<p class="sub"><Strong>Rating:</strong>{{ $restaurant->rating }}</p>
	<hr class="featurette-divider">
	
	
	
	
</div>
@endsection