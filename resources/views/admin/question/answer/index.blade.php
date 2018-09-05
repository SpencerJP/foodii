@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h1>Showing {{ $question->questionvalue }}</h1>
            <p><a href="{{ URL::to('/admin/questions/'. $question->id . '/create') }}">Add New Answer</a></p>
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
                        </td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection