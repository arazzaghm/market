<div class="card">
    <div class="card-header">
        <b>@lang('question.question') #{{$question->id}}</b>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            {{$question->title}}
            @if($question->isAnswered() && $question->answer->isNotViewed())
                <span class="badge badge-primary">@lang('common.new')</span>
            @endif
        </h5>
        <p class="card-text">{{Str::limit($question->text, 50)}}</p>
        <p class="card-text">@lang('common.status'): @lang('question.' . $question->getStatusAsString())</p>
        <p class="card-text">@lang('common.createdAt'): {{$question->formatCreatedAtDate()}}</p>
        <a href="{{route('questions.show', ['question' => $question])}}" class="btn btn-primary">@lang('common.show')</a>
    </div>
</div>
