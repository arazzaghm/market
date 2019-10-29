@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-8">
            <h2>{{$question->title}}</h2>
            <p>{{$question->text}}</p>
        </div>
    </div>
    @include('pages.questions.partials.modal')
@endsection
