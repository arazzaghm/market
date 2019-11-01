@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-8">
            <h2>Support page</h2>
            <p>Before sending the question please check our <a href="{{route('popular-questions.index')}}">popular questions</a></p>
            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#questionModal">New question</button>
            {{$questions->links()}}
            @forelse($questions as $question)
                @include('pages.questions.partials.card')
            @empty
                <div class="alert alert-primary" role="alert">
                    Sorry, you have no questions yet.
                </div>
            @endforelse
            {{$questions->links()}}
        </div>
    </div>
    @include('pages.questions.partials.modal')
@endsection
