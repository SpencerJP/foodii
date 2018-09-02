@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>User Type</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->getUserTypeToString()}}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            

                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id) }}">Details</a>

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id . '/edit') }}">Edit</a>

                            <a class="btn">
                            {{ Form::open(array('url' => '/restaurantowner/restaurants/' . $value->id, 'class' => 'pull-left')) }}
                               {{ Form::hidden('_method', 'DELETE') }}
                               {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger')) }}
                            {{ Form::close() }}
                            </a>
                            
                            

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection