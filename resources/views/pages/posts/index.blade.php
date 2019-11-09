@extends('layouts.app')

@section('content')
    <h1>@lang('common.posts')</h1>
    {{$posts->links()}}
    @include('pages.posts.partials.posts')
    {{$posts->links()}}
@endsection
