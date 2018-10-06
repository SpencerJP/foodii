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
    @foreach($quiz->potentialRestaurants as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->countTags($quiz->tags) }}</td>
            <td>
              @foreach($value->tags as $tagKey => $tagValue){{ $tagValue->name}}, @endforeach</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p>{{$quiz->potentialRestaurants->count()}}</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Tag Name</td>
            <td>Tag Type</td>
        </tr>
    </thead>
    <tbody>
    @foreach($quiz->tags as $key => $value)
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
    @foreach($quiz->questions as $key => $value)
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
