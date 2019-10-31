@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Create popular question
        </div>
        <div class="body">
            <form action="{{route('admin.popular-questions.store')}}" method="POST">
                @include('admins.pages.popularQuestions.partials.form')
                <button class="btn btn-lg btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
