@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Question: {{ $question->questionvalue}} </h1>
            <h2>Answer: {{ $answer->answervalue}} </h2>
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
                            @if(in_array(value, $answerTags))
                            <a class="btn btn-small btn-success" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id) }}">Details</a>
                            @else
                            <a class="btn btn-small btn-info" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id . '/edit') }}">Edit</a>

                            <a class="btn btn-small btn-danger" href="{{ URL::to('/restaurantowner/restaurants/' . $value->id . '/edit') }}">Delete</a>
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