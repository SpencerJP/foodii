@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Restaurant Name</td>
                        <td>Address</td>
                        <td>Rating</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->rating }}</td>

                        <td>

                            <a class="btn btn-small btn-success" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id) }}">Details</a>
                            
                            <a class="btn btn-small btn-success" href="{{ URL::to('/restaurants/' . $value->id . '/viewtags/') }}">View Tags</a>
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
