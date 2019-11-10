@extends('layouts.app')

@section('content')
    {{$bookmarks->links()}}
    @forelse($bookmarks as $bookmark)
        @include('pages.bookmarks.partials.bookmark_horizontal_card')
    @empty
        <div class="alert alert-primary" role="alert">
            <div class="d-flex justify-content-center">
                @lang('sentence.bookmark.noBookmarks')
            </div>
        </div>
    @endforelse
    {{$bookmarks->links()}}
@endsection
