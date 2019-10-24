@extends('layouts.app')

@section('content')
    {{$bookmarks->links()}}
    @forelse($bookmarks as $bookmark)
        @include('pages.bookmarks.partials.bookmark_horizontal_card')
    @empty
        <div class="alert alert-primary" role="alert">
            Sorry, you don`t have bookmarks now!
        </div>
    @endforelse
    {{$bookmarks->links()}}
@endsection
