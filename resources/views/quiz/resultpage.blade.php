@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
        <p>Result: {{App\Models\Restaurant::find($quizresult->restaurant_id)->name}}</p>
        @if(Config::get('quizoptions.debug_mode'))
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>ID</td>
                      <td>Restaurant Name</td>
                      <td>countTags()</td>
                      <td>Rating</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($quizresult->quiz->potentialRestaurants as $key => $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->countTags($quizresult->quiz->tags) }}</td>
                      <td>
                        @foreach($value->tags as $tagKey => $tagValue){{ $tagValue->name}}, @endforeach</td>
                  </tr>
              @endforeach
              </tbody>
          </table>
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>Tag Name</td>
                      <td>Tag Type</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($quizresult->quiz->tags as $key => $value)
                  <tr>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->type}}</td>
                  </tr>
              @endforeach
              </tbody>
          </table>
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>ID</td>
                      <td>Question</td>
                      <td>Weight</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($quizresult->quiz->questions as $key => $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->questionvalue }}</td>
                      <td>{{ $value->weight }}</td>
                  </tr>
              @endforeach
              </tbody>
          </table>
          <form action="{{ route('quiz.destroy') }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-small btn-danger">Remove quiz (debugging only)</button>
          </form>
        @endif
      </div>
    </div>
</div>
@endsection
