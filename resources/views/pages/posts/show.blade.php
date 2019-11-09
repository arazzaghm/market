@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-12">
            @can('update', $post)
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('common.actions')
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @can('archive', $post)
                            <button class="dropdown-item" data-toggle="modal" data-target="#editPost">
                                <i class="fa fa-edit"></i>
                                @lang('post.actions.edit')
                            </button>
                        @endcannot
                        <button class="dropdown-item" data-toggle="modal" data-target="#deletePost">
                            <i class="fa fa-trash"></i>
                            @lang('post.actions.delete')
                        </button>
                        <form action="{{route('posts.hide', ['post' => $post])}}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                <i class="fa {{!$post->isHidden() ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                                {{$post->isHidden() ? trans('post.actions.makeVisible') : trans('post.actions.hide')}}
                            </button>
                        </form>

                        @can('archive', $post)
                            @if($post->getFirstMedia('picture'))
                                <form action="{{route('post-pictures.destroy', ['post' => $post])}}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="fa fa-photo"></i>
                                        @lang('post.actions.deletePicture')
                                    </button>
                                </form>
                            @endif
                        @endcan
                        @can('archive', $post)
                            <button class="dropdown-item" data-toggle="modal" data-target="#archivePost">
                                <i class="fa fa-archive"></i>
                                @lang('post.actions.archive')
                            </button>
                        @endcan
                    </div>
                </div>
            @endcan
            <div class="card mt-4">
                <div class="d-flex justify-content-center">
                    <img class="card-img-top {{$post->isArchived() ? 'grayscale' : ''}}" src="{{ $media }}"
                         style="width: 50%; height: 50%;">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">{{$post->title}}</h3>
                            <h4>{{$post->getFormattedPrice()}}</h4>
                            <h4>@lang('common.category'): <span
                                    class="fa {{$post->category->getFaIconName()}}"></span> {{$post->category->getNameByLocale()}}
                            </h4>
                            <p class="card-text">{{$post->description}}</p>
                            <p><i class="fa fa-eye"></i> {{$post->viewed_times}}</p>
                            @auth
                                <div class="row">
                                    <div class="col-0 ml-2">
                                        <form action="{{route('bookmarks.store', ['post' => $post])}}" method="POST">
                                            @csrf
                                            <button
                                                class="btn {{$post->isInBookmarks() ? 'btn-dark' : 'btn-outline-dark'}}">
                                                <i class="fa fa-bookmark"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-0 ml-1">
                                        @include('partials.buttons.report-button')
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="col-md-6">
                            <p class="card-text">
                                <a href="{{route('companies.show', ['company' =>$post->company ])}}">
                                    <img src="{{$post->company->getLogoUrl()}}" alt="">
                                </a>
                            </p>
                        </div>
                    </div>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars
                </div>
            </div>
            <!-- /.card -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                   @lang('post.comments.comments')
                </div>
                <div class="card-body">
                    @forelse($comments as $comment)
                        <small class="text-muted"> @lang('post.comments.postedBy') @if($comment->anonymous) @lang('post.comments.anonymous') @else <a
                                href="{{route('users.show', $comment->user()->first())}}">{{$comment->user()->first()->name}} @endif</a>
                            {{$comment->formatCreatedAtDate()}}</small>
                        <p>{{$comment->text}}</p>
                    @empty
                        <p>Leave first review!</p>
                    @endforelse
                    {{$comments->links()}}
                    <hr>
                    @unless($post->isArchived())
                        <form @auth action="{{route('comments.store', ['post' => $post])}}" method="POST" @endauth>
                            @auth
                                @csrf
                            @endauth
                            <div class="form-group">
                                <label for="comment">@lang('post.comments.type.yourComment')</label>
                                <textarea class="form-control" id="comment" placeholder="@lang('post.comments.type.yourComment')" @auth name="text"
                                          @endauth
                                          required @guest {{'disabled'}} @endguest></textarea>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="anonymous"
                                       @auth name="anonymous" @endauth>
                                @auth
                                    <label class="custom-control-label" for="anonymous">@lang('post.comments.type.anonymous')</label>
                                @endauth
                            </div>
                            <button type="submit" class="btn btn-success mt-2" @guest {{'disabled'}} @endguest>
                                @lang('common.send')
                            </button>
                        </form>
                    @else
                        Sorry, you can`t comment archived post.
                    @endunless
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
    </div>

    @auth
        @include('partials.modals.report-modal', ['model' => $post])
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
