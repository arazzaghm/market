<div class="card">
    <div class="card-header">
        <b>Question #{{$question->id}}</b>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$question->title}}</h5>
        <p class="card-text">{{Str::limit($question->text, 50)}}</p>
        <a href="{{route('questions.show', ['question' => $question])}}" class="btn btn-primary">Show question</a>
    </div>
</div>
