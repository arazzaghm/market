@extends('layouts.app')

@section('content')
    <h2>Edit post</h2>
    <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
        @method('PATCH')
        @include('pages.posts.partials.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
