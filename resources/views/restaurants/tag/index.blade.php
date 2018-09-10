@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Restaurant: {{ $restaurant->name}} </h1>
            <h3><a href="{{ URL::to('/restaurants/') }}">Back to Restaurants</a></h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Tag Name</td>
                        <td>Tag Type</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($completeTagList as $key => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->type}}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            @if($restaurantTags->contains($value->id))
                                <a class="btn btn-small btn-danger" href="{{ URL::to('/restaurants/' . $restaurant->id .'/removetag/' . ($value->id))}}">Remove</a>
                            @else
                                <a class="btn btn-small btn-success" href="{{ URL::to('/restaurants/' . $restaurant->id .'/addtag/' . ($value->id))}}">Add</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
