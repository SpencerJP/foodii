@extends('layouts.app')

@section('content')
<div class="container">
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
	<div class="col-md-6 px-0">
	  <h1 class="display-4 font-italic">Question 1</h1>
	  <p class="lead my-3">What type of food eater would best describe yourself?</p>
	</div>
  </div>


	<div class="col-md-12">
	  <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
		  <strong class="d-inline-block mb-2 text-primary">Selection 1</strong>
		  <h3 class="mb-0">
			<a class="text-dark" href="#">Omnivore</a>
		  </h3>
		</div>
	  </div>
	</div>
	<div class="col-md-12">
	  <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
		  <strong class="d-inline-block mb-2 text-primary">Selection 2</strong>
		  <h3 class="mb-0">
			<a class="text-dark" href="#">Vegetarian </a>
		  </h3>
		</div>
	  </div>
	</div>
	<div class="col-md-12">
	  <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
		  <strong class="d-inline-block mb-2 text-primary">Selection 3</strong>
		  <h3 class="mb-0">
			<a class="text-dark" href="#">All good</a>
		  </h3>
		</div>
	  </div>
	</div>
</div>
@endsection
