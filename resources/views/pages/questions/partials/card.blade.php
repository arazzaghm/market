<div class="card">
    <div class="card-header">
        <b>Question #{{$question->id}}</b>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            {{$question->title}}
            @if($question->isAnswered() && $question->answer->isNotViewed())
                <span class="badge badge-primary">New</span>
            @endif
        </h5>
        <p class="card-text">{{Str::limit($question->text, 50)}}</p>
        <p class="card-text">Status: {{$question->getStatusAsString()}}</p>
        <p class="card-text">Created at: {{$question->formatCreatedAtDate()}}</p>
        <a href="{{route('questions.show', ['question' => $question])}}" class="btn btn-primary">Show question</a>
    </div>
</div>
