@extends('layouts.app')

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                @if($errors->has('avatar'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->get('avatar')[0]}}
                    </div>
                @endif
                <div class="profile-img">
{{--                    <img src="{{$user->getFirstMedia('avatar') ? $avatar->getUrl() : asset('img/default_avatar.png')}}"--}}
{{--                         alt="">--}}
                    @can('edit', $user)
                        <form action="{{route('avatar.store', ['userId' => $user->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="file btn btn-lg btn-primary">
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
                        {{$user->name}} | <span class="badge {{$user->isOnline() ? 'badge-success' : 'badge-danger'}}">{{$user->isOnline() ? 'Online' : 'Offline'}}</span>
                    </h5>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Timeline</a>
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
                <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div>
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
                                @cannot('edit', $user)
                                    <p>{{substr_replace($user->email, 'hidden', 0, strlen($user->email))}}</p>
                                @endcannot
                                @can('edit', $user)
                                    <p>{{$user->email}}</p>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
