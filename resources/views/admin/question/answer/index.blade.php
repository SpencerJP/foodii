@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Showing {{ $question->questionvalue }}</h1>
            <h3><a href="{{ URL::to('/questions/'. $question->id . '/create') }}">Add New Answer</a></h3>
            <h3><a href="{{ URL::to('/questions/') }}">Back to Questions</a></h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Answer</td>
                        <td>Tags</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers->get() as $key => $value)
                    <tr>
                    <td>{{ $value->answervalue }}</td>

                    <td>
                        @foreach($value->tags()->get() as $tag)
                            {{ $tag->name }},
                        @endforeach
                        </td>
                        <td><a class="btn btn-small btn-success" href="{{ URL::to('/questions/' . $question->id .'/' . $value->id )}}">Edit Tags</a></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
