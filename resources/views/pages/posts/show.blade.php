@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-12">
            @can('update', $post)
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('posts.edit', ['post' => $post])}}">Edit</a>
                        <form action="{{route('posts.hide', ['post' => $post])}}" method="POST">
                            @csrf
                            <button class="dropdown-item">{{$post->isHidden() ? 'Make visible' : 'Hide'}}</button>
                        </form>
                        <form action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item">Delete</button>
                        </form>
                        @if($post->getFirstMedia('picture'))
                            <form action="{{route('post-pictures.destroy', ['post' => $post])}}" method="POST">
                                @csrf
                                <button class="dropdown-item">Delete picture</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endcan
            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="{{$post->getPictureUrl()}}" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <h4>${{$post->price}}</h4>
                    <h4>Category: <span
                            class="fa {{$post->category->getFaIconName()}}"></span> {{$post->category->name}}</h4>
                    <p class="card-text">{{$post->description}}</p>
                    <p><i class="fa fa-eye"></i> {{$post->viewed_times}}</p>
                    @auth
                        <div class="row">
                            <div class="col-0 ml-2">
                                <form action="{{route('bookmarks.store', ['post' => $post])}}" method="POST">
                                    @csrf
                                    <a class="btn {{$post->isInBookmarks() ? 'btn-dark' : 'btn-outline-dark'}}">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="col-0 ml-1">
                                <a data-toggle="modal" data-target="#reportModal" class="btn btn-outline-dark">
                                    <i class="fa fa-flag"></i>
                                </a>
                            </div>
                        </div>
                    @endauth
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
                    <form @auth action="{{route('comments.store', ['post' => $post])}}" method="POST" @endauth>
                        @auth
                            @csrf
                        @endauth
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" placeholder="Your comment" @auth name="text"
                                      @endauth
                                      required @guest {{'disabled'}} @endguest></textarea>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="anonymous"
                                   @auth name="anonymous" @endauth>
                            @auth
                                <label class="custom-control-label" for="anonymous">Anonymous comment</label>
                            @endauth
                        </div>
                        <button type="submit" class="btn btn-success" @guest {{'disabled'}} @endguest>Leave a Review
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
    </div>

    @auth
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Report this post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                                <label for="report_type_id">Reason</label>
                                <select name="report_type_id" id="report_type_id" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">1</option>
                                </select>
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3"
                                          class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="model" value="{{\App\Models\Post::class}}">
                            <input type="hidden" name="model_id" value="{{$post->id}}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
