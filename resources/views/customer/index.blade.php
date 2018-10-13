

@extends('layouts.app')

<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

.jumbotron {
    background-image: url("/images/navimage2.png");
    min-height: 38%;
    background-repeat: no-repeat;
    background-position: center;
    -webkit-background-size: cover;
    background-size: cover;
}

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

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

.rating > .half:before {
  content: "\f089";
  position: absolute;
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

<main role="main">

	<section class="jumbotron text-center">
	<div class="container">
	  <h1 class="jumbotron-heading">Welcome Back! </h1>
	  <p class="lead ">This is your history</p>
	  <p class="lead ">You can rate the selected restaurants.</p>
	</div>
	</section>

	<div class="container">
	  <div class="row">
       @foreach($quizresults as $key => $value)
      		<div class="col-md-6 col-sm-6">
      		  <div class="thumbnauk" style="height: 600px">
      			<img class="card-img-top" src="" alt=""><!--?php echo $restaurant['name/image']?-->
      			    <div class="card-body">
                  <p class="card-text"><td>Name:</td>{{ App\Models\Restaurant::find($value->restaurant_id)->name }}</p>
                    <div class="address">
                      <p class="sub">{{ App\Models\Restaurant::find($value->restaurant_id)->address }}</p>
                      <p class="sub">{{ App\Models\Restaurant::find($value->restaurant_id)->phone_number }}</p>
                    </div>
                    <form action="{{ route('history.rate') }}" method="POST">
                    <p class="card-text"><td>Rating:</td>

                      <fieldset class="rating" method="POST">
        								<input type="radio" id="star5_{{$key}}" name="rating"{{$value->getRatingChecked(5)}}value="5" /><label class = "full" for="star5_{{$key}}" title="Awesome - 5 stars"></label>
        								<input type="radio" id="star4_{{$key}}" name="rating"{{$value->getRatingChecked(4)}}value="4" /><label class = "full" for="star4_{{$key}}" title="Pretty good - 4 stars"></label>
        								<input type="radio" id="star3_{{$key}}" name="rating"{{$value->getRatingChecked(3)}}value="3" /><label class = "full" for="star3_{{$key}}" title="Meh - 3 stars"></label>
        								<input type="radio" id="star2_{{$key}}" name="rating"{{$value->getRatingChecked(2)}}value="2" /><label class = "full" for="star2_{{$key}}" title="Kinda bad - 2 stars"></label>
        								<input type="radio" id="star1_{{$key}}" name="rating"{{$value->getRatingChecked(1)}}value="1" /><label class = "full" for="star1_{{$key}}" title="Sucks big time - 1 star"></label>
        							</fieldset>

                      {{ Form::hidden('result_id', $value->id) }}
                      {{ Form::submit('Rate', array('class' => 'btn btn-primary')) }}

                      @csrf
        						</p>
                </form>
              </div>
      			 </div>
      		  </div>
      		</div>
		 @endforeach
	  </div>
	</div>

</main>



@endsection
