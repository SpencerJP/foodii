

@extends('layouts.app')

@section('content')
	
<main role="main">

	<section class="jumbotron text-center">
	<div class="container">
	  <h1 class="jumbotron-heading">Welcome Back! </h1>
	  <p class="lead text-muted">This is your history</p>
	  <p class="lead text-muted">You can rate the selected restaurants.</p>
	</div>
	</section>

	<div class="container">
	  <div class="row">
         @foreach($restaurants as $key => $value)
		<div class="col-md-6 col-sm-6">
		  <div class="thumbnauk" style="hegiht: 600px">
			<img class="card-img-top" src="" alt=""><!--?php echo $restaurant['name/image']?-->
			    <div class="card-body">
                    <p class="card-text"><td>Name:</td>{{ $value->name }}</p>
                    <p c><td>ID:</td>{{ $value->id }}</p>
                    <p class="card-text"><td>Rating:</td>{{ $value->rating }}</p>
                    <div class="address">
                        <p class="sub">{{ $value->address }}</p>
                        <p class="sub">{{ $value->phone_number }}</p>
                    </div>          
			    </div>
			</div>  
		  </div>
		</div>
		 @endforeach
	  </div>
	</div>
	
</main>



@endsection
