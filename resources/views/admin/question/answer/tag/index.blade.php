@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Question: {{ $question->questionvalue}} </h1>
            <h2>Answer: {{ $answer->answervalue}} </h2>
            <h3><a href="{{ URL::to('/questions/' . $question->id . '/') }}">Back to Answers</a></h3>
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
                            @if($answerTags->contains($value->id))
                                <a class="btn btn-small btn-danger" href="{{ URL::to('/questions/' . $question->id .'/' . $answer->id . '/removetag/' . ($value->id))}}">Remove</a>
                            @else
                                <a class="btn btn-small btn-success" href="{{ URL::to('/questions/' . $question->id .'/' . $answer->id . '/addtag/' . ($value->id))}}">Add</a>
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
