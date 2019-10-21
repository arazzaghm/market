@extends('layouts.app')

@section('content')
    <h2>Create post</h2>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @include('pages.posts.partials.form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
