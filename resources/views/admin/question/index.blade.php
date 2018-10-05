@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <p><a href="{{ URL::to('/questions/create') }}">Create New</a></p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Question</td>
                        <td>Weight</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($questions as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->questionvalue }}</td>
                        <td>{{ $value->weight }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('/questions/' . $value->id) }}">Edit</a>

                            <form action="{{ route('questions.destroy', $value->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-small btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
