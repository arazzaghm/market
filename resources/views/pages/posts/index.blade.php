@extends('layouts.app')

@section('content')
    <h1>Sex</h1>
    <div class="card-deck">
        @forelse($posts as $post)
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <p class="card-text">${{$post->price}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Published on {{$post->formatCreatedAtDate()}}</small>
                </div>
            </div>
        @empty

        @endforelse
    </div>
@endsection
