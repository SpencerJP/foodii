@extends('layouts.app')

<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
	
}


.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 

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

					
					
					<fieldset class="rating">
					<td>Rating:</td>
							<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
					</fieldset>
					
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
