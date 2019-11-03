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
                        @can('archive', $post)
                            <button class="dropdown-item" data-toggle="modal" data-target="#editPost">
                                <i class="fa fa-edit"></i>
                                Edit
                            </button>
                        @endcannot
                        <button class="dropdown-item" data-toggle="modal" data-target="#deletePost">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                        <form action="{{route('posts.hide', ['post' => $post])}}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                <i class="fa {{!$post->isHidden() ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                                {{$post->isHidden() ? 'Make visible' : 'Hide'}}
                            </button>
                        </form>

                        @can('archive', $post)
                            @if($post->getFirstMedia('picture'))
                                <form action="{{route('post-pictures.destroy', ['post' => $post])}}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="fa fa-photo"></i>
                                        Delete picture
                                    </button>
                                </form>
                            @endif
                        @endcan
                        @can('archive', $post)
                            <button class="dropdown-item" data-toggle="modal" data-target="#archivePost">
                                <i class="fa fa-archive"></i>
                                Archive
                            </button>
                        @endcan
                    </div>
                </div>
            @endcan
            <div class="card mt-4">
                <div class="d-flex justify-content-center">
                    <img class="card-img-top {{$post->isArchived() ? 'grayscale' : ''}}" src="{{ $media }}" style="width: 50%; height: 50%;">
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <h4>{{$post->price}} {{$post->currency->name}}</h4>
                    <h4>Category: <span
                            class="fa {{$post->category->getFaIconName()}}"></span> {{$post->category->name}}</h4>
                    <p class="card-text">{{$post->description}}</p>
                    <p><i class="fa fa-eye"></i> {{$post->viewed_times}}</p>
                    @auth
                        <div class="row">
                            <div class="col-0 ml-2">
                                <form action="{{route('bookmarks.store', ['post' => $post])}}" method="POST">
                                    @csrf
                                    <button class="btn {{$post->isInBookmarks() ? 'btn-dark' : 'btn-outline-dark'}}">
                                        <i class="fa fa-bookmark"></i>
                                    </button>
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
                        <form action="{{route('reports.store', ['model' => $post])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                                <label for="report_type_id">Reason</label>
                                <select name="type_id" id="report_type_id" class="form-control">
                                    @foreach($reportTypes as $reportType)
                                        <option value="{{$reportType->id}}">{{$reportType->name}}</option>
                                    @endforeach
                                </select>
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3"
                                          class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="model_type" value="{{\App\Models\Post::class}}">
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

    @can('update', $post)
        @can('archive', $post)
            <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('posts.update', ['post' => $post])}}" method="POST"
                                  enctype="multipart/form-data">
                                @method('PATCH')
                                @include('pages.posts.partials.form')
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endcan

    @can('archive', $post)
        <div class="modal fade" id="archivePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Archive post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure? You won`t be able to edit this post and another people won`t be able to see it
                            in search!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('posts.archive', ['post' => $post])}}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nope, I won`t do it
                            </button>
                            <button type="submit" class="btn btn-danger">Yes, i`m sure!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('update', $post)
        <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure? You won`t be able restore the post! Do you want to continue?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('posts.destroy', ['post' => $post])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Delete!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
