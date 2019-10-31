@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{$question->title}}</h5>
                    <p class="card-text"><small class="text-muted">
                            Status: {{$question->getStatusAsString()}}</small>
                    </p>
                    <p class="card-text">
                        {{$question->text}}
                    </p>
                    @if($question->isAnswered())
                        <hr>
                        <h4>Answer from administrator:</h4>
                        <p class="card-text">{{$question->answer->text}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('pages.questions.partials.modal')
@endsection
