@extends('layouts.app')

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img
                        class="mt-1"
                        src="{{$user->getAvatarUrl()}}">
                    @can('editAvatar', $user)
                        <form action="{{route('avatar.store', ['user' => $user])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="file btn btn-lg btn-success">
                                Change Photo
                                <input type="file" name="avatar" onchange="this.form.submit();">
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$user->name}} | <span
                            class="badge {{$user->isOnline() ? 'badge-success' : 'badge-danger'}}">{{$user->isOnline() ? 'Online' : 'Offline'}}</span>
                    </h5>
                    @auth
                        <div class="col-0 ml-1">
                            <a data-toggle="modal" data-target="#reportModal" class="btn btn-outline-dark">
                                <i class="fa fa-flag"></i>
                            </a>
                        </div>
                    @endauth
                    <p class="proile-rating">TOTAL POSTS : <span>{{$countedPosts}}</span></p>
                    <p class="proile-rating">HIDDEN POSTS : <span>{{$countedHiddenPosts}}</span></p>
                    <p class="proile-rating">ARCHIVED POSTS : <span>{{$countedArchivedPosts}}</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Users post</a>
                        </li>
                    </ul>
                </div>
            </div>
            @can('edit', $user)
                <div class="col-md-2">
                    <a class="btn btn-outline-dark" href="{{route('users.edit', ['user' => $user])}}">Edit
                        profile </a>
                </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p> {{$user->id}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p> {{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">\
                        {{$posts->links()}}
                        @include('pages.posts.partials.posts')
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
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
                        <form action="{{route('reports.store', ['model' => $user])}}" method="POST">
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
                            <input type="hidden" name="model_type" value="{{\App\Models\User::class}}">
                            <input type="hidden" name="model_id" value="{{$user->id}}">
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

