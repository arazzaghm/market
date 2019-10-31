@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Update popular question
        <div class="body">
            <form action="{{route('admin.popular-questions.update', ['popularQuestion' => $popularQuestion])}}" method="POST">
                @method('PATCH')
                @include('admins.pages.popularQuestions.partials.form')
                <button class="btn btn-lg btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
