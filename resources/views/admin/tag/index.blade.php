@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h3><a href="{{  url('/tags/create') }}">Add New Tag</a></h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Type</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $key => $value)
                    <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->type }}</td>

                    <td>

                      <form action="{{ route('tags.destroy', $value->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-small btn-danger">Delete</button>
                      </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
