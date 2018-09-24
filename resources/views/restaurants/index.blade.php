@extends('layouts.app')

<style>
@import url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css);
/****** Style Star Rating Widget *****/
.checked {
    color: orange;
}	
</style>







@section('content')
<!--
					<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
					  <h5 class="my-0 mr-md-auto font-weight-normal">Foodii</h5>
					  <nav class="my-2 my-md-0 mr-md-3">
						<a class="p-2 text-dark" href="#">Home</a>
						<a class="p-2 text-dark" href="#">Enterprise</a>
						<a class="p-2 text-dark" href="#">About</a>
						<a class="p-2 text-dark" href="#">Contact</a>
					  </nav>
					  <a class="btn btn-outline-primary" href="#">Login</a>
					  <a class="btn btn-outline-primary" href="#">Register</a>
					</div>

-->
	


<main role="main">

	<section class="jumbotron text-center">
	<div class="container">
	  <h1 class="jumbotron-heading">Welcome Back! </h1>
	  <p class="lead text-muted">You can view and edit restaurants you have.Please E-mail us if you have any questions.</p>
	  <p class="lead text-muted">Foodii@help.com</p>
	</div>
	</section>

	<div class="container">
	  <div class="row">
	  	@foreach($restaurants as $key => $value)	
		<div class="col-md-6 col-sm-6">
		  <div class="thumbnauk">
			<img class="card-img-top" src="/images/MC.png" alt="" height="400"><!--?php echo $restaurant['name/image']?-->
				<div class="card-body">
				<p class="card-text"><td>Name:</td>{{ $value->name }}</p>
				<hr class="featurette-divider">	
				<p ><td>ID:</td>{{ $value->id }}</p>
				<p>
					
					@if ($value->rating == 1) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}
					@elseif ($value->rating == 2) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($value->rating == 3) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($value->rating == 4) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($value->rating == 5) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
					}

					@else  {
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@endif
					
				</p>
				<hr class="featurette-divider">
				<p class="card-text">{{ $value->address }}</p>
				<p class="card-text">Mon-Sat : 9am - 10pm , Sun : 9am - 12am.</p>
				<p class="card-text"	>{{ $value->phone_number }}</p>
				<hr class="featurette-divider">
				<div class="caption">
				<a class="btn btn-primary" href="{{ URL::to('/restaurants/' . $value->id) }}">Details</a>
				
				<a class="btn btn-default" href="{{ URL::to('/restaurants/' . $value->id . '/viewtags/') }}">View Tags</a>
				
				<a class="btn btn-success" href="{{ URL::to('/restaurants/' . $value->id . '/edit') }}">Edit</a>
				
				<a class="">
					{{ Form::open(array('url' => '/restaurantowner/restaurants/' . $value->id, 'class' => 'pull-right')) }}
					   {{ Form::hidden('_method', 'DELETE') }}
					   {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</a>
				
				</div>
			</div>
		  </div>
		</div>
		 @endforeach
	  </div>
	</div>
	
</main>



@endsection
