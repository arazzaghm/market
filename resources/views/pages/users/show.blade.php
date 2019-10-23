@extends('layouts.app')

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img
                        class="mt-1"
                        src="{{$user->getFirstMedia('avatar') ? $user->getFirstMediaUrl('avatar')  : asset('img/default_avatar.png')}}">
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('pages.posts.partials.posts')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
