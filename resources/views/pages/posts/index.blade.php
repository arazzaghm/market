@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    {{$posts->links()}}
    @include('pages.posts.partials.posts')
    {{$posts->links()}}
@endsection
