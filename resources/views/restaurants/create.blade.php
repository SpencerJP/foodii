@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <img src="" alt="" width="72" height="72"><!--set image here-->
        <h2>Apply form</h2>
        <p class="lead">Please fill out the form below</p>
    </div>
	<div class="row justify-content-center">
		<div class="card-body">
		 {{ Form::open(array('url' =>  route("restaurants.store"), 'method' => 'POST')) }}
		
			<div class="row">
				<div class="col-md-4 ">
				  <h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your Tags</span>
				  </h4>
				  <ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between ">
					  <div>
						<h6 class="my-0">First tag</h6>
					  </div>
					</li>
					<li class="list-group-item d-flex justify-content-between ">
					  <div>
						<h6 class="my-0">Second tag</h6>
					  </div>
					</li>
					<li class="list-group-item d-flex justify-content-between ">
					  <div>
						<h6 class="my-0">Third tag</h6>
					  </div>
					</li>
				  </ul>
				  <form class="card ">
					<div class="input-group">
					  <input type="text" class="form-control" >
					  <div class="input-group-append">
						<button type="submit" class="btn btn-secondary">Add</button>
					  </div>
					</div>
				  </form>
				</div>
				<div class="col-md-8">
				  <h4 class="mb-3">Restaurant Detail</h4>
				  <form class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="RestaurantName">Restaurant Name</label>
					  <div class="input-group">
						<input type="text" class="form-control" id="RestaurantName" placeholder="RestaurantName" required>
						<div class="invalid-feedback" style="width: 100%;">
						  Your restaurant name is required.
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6 mb-3">
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name', null, array('class' => 'form-control')) }}
						</div>
					  </div>
					  <div class="col-md-6 mb-3">
					  </div>
					</div>

					<div class="mb-3">
					<div class="form-group">
						{{ Form::label('description', 'Description') }}
						{{ Form::text('description', null, array('class' => 'form-control')) }}
					</div>
					</div>

					<div class="mb-3">
					  <label for="email">Email </label>
					  <input type="email" class="form-control" id="email" placeholder="you@example.com">
					  <div class="invalid-feedback">
						Please enter a valid email address.
					  </div>
					</div>
					<div class="form-group">
						<div class="mb-3">
						<div class="form-group">
							{{ Form::label('address', 'Address') }}
							{{ Form::text('address', null, array('class' => 'form-control')) }}
						</div>
						</div>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Apply</button>
				  </form>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	
	
</div>
@endsection