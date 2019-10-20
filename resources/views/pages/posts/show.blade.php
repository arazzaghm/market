@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-12">
            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <h4>${{$post->price}}</h4>
                    <h4>{{$post->getCategoryName()}}</h4>
                    <p class="card-text">{{$post->description}}</p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars
                </div>
            </div>
            <!-- /.card -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">
                    @forelse($comments as $comment)
                        <small class="text-muted">Posted by @if($comment->anonymous) Anonymous @else <a
                                href="{{route('users.show', $comment->user()->first())}}">{{$comment->user()->first()->name}} @endif</a>
                            on {{$comment->formatCreatedAtDate()}}</small>
                        <p>{{$comment->text}}</p>
                    @empty
                        <p>Leave first review!</p>
                    @endforelse
                    {{$comments->links()}}
                    <hr>
                    <form action="{{route('comments.store', ['post' => $post])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" placeholder="Your comment" name="text"
                                      required></textarea>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="anonymous" name="anonymous">
                            <label class="custom-control-label" for="anonymous">Anonymous comment</label>
                        </div>
                        <button type="submit" class="btn btn-success">Leave a Review</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
@endsection
