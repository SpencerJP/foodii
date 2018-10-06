@extends('layouts.app')


<style>
@import url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css);
/****** Style Star Rating Widget *****/
.checked {
    color: orange;
}
</style>



@section('content')

<div class="container">
    <section class="jumbotron">

    </section>
    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">{{ $restaurant->name }}</h2>
        <p class="lead">{{ $restaurant->description }}</p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="{{ $restaurant->restaurant_image }}">
    </div>

    </div>
        <p class="sub">{{ $restaurant->address }}</p>
        <p class="sub">{{ $restaurant->phone_number }}</p>
        <p>
				<td>Rating</td>
					@if ($restaurant->rating == 1) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}
					@elseif ($restaurant->rating == 2) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->rating == 3) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->rating == 4) {
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
					}

					@elseif ($restaurant->rating == 5) {
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
</div>
@endsection
