@extends('layouts.app')


<style>
@import url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css);
/****** Style Star Rating Widget *****/
.checked {
    color: orange;
}


.jumbotron {
    background-image: url("/images/navimage2.png");
    min-height: 30%;
    background-repeat: no-repeat;
    background-position: center;
    -webkit-background-size: cover;
    background-size: cover;
}
</style>



@section('content')
<section class="jumbotron">

</section>
<div class="container">
   
    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">{{ $restaurant->name }}</h2>
        <p class="lead">{{ $restaurant->description }}</p>
		<p class="sub">{{ $restaurant->address }}</p>
        <p class="sub">{{ $restaurant->phone_number }}</p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="{{ $restaurant->restaurant_image }}" width="300" height="400">
    </div>

    </div>
        
        <p>
				<td>Rating</td>
					@if ($restaurant->getRoundedRating() == 1) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}
					@elseif ($restaurant->getRoundedRating() == 2) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->getRoundedRating() == 3) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->getRoundedRating() == 4) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->getRoundedRating() == 5) {
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
    <div style="width: 1000px; height: 500px;">
       {!! Mapper::render() !!}
    </div>
	<p><a href="{{ route('restaurants.index') }}" class="btn btn-primary my-2" >Back</a></p>

</div>









@endsection
