@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        @lang('sentence.category.popularCategories')
                    </div>
                    <ul class="list-group">
                        @forelse($popularCategories as $category)
                            <a href="{{route('posts.index', ['category' => $category])}}"
                               class="text-decoration-none text-dark">
                                <li class="list-group-item">
                                    <i class="fa {{$category->getFaIconName()}}"></i>
                                    {{$category->name}}
                                </li>
                            </a>
                        @empty
                            <div class="alert alert-secondary mb-auto">
                                @lang('sentence.category.noPopularCategories') :(
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h1>CONTENT</h1>
            </div>
        </div>
    </div>
@endsection
