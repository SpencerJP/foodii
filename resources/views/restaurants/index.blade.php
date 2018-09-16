@extends('layouts.app')

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
		  <div class="thumbnauk" style="hegiht: 600px">
			<img class="card-img-top" src="/images/MC.png" alt=""><!--?php echo $restaurant['name/image']?-->
			<div class="card-body">
				<p class="card-text"><td>Name:</td>{{ $value->name }}</p>
				<p c><td>ID:</td>{{ $value->id }}</p>
				<p class="card-text"><td>Rating:</td>{{ $value->rating }}</p>
				<div class="address">
					<p class="sub">{{ $value->address }}</p>
					<p class="sub">Mon-Sat : 9am - 10pm , Sun : 9am - 12am.</p>
					<p class="sub">{{ $value->phone_number }}</p>
				</div>
				
				<div class="caption">
				<a class="btn btn-primary" href="{{ URL::to('/restaurants/' . $value->id) }}">Details</a>
				
				<a class="btn btn-default" href="{{ URL::to('/restaurants/' . $value->id . '/viewtags/') }}">View Tags</a>
				
				<a class="btn btn-success" href="{{ URL::to('/restaurants/' . $value->id . '/edit') }}">Edit</a>
				
				<a class="btn ">
					{{ Form::open(array('url' => '/restaurantowner/restaurants/' . $value->id, 'class' => 'pull-left')) }}
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
