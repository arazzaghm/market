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
                            <div class="file btn btn-lg btn-primary">
                                @lang('user.changePhoto')
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
                            class="badge {{$user->isOnline() ? 'badge-success' : 'badge-danger'}}">{{$user->isOnline() ? trans('user.online') : trans('user.offline')}}</span>
                    </h5>
                    @auth
                        <div class="col-0 ml-1">
                            @include('partials.buttons.report-button')
                        </div>
                    @endauth
                    <p class="proile-rating">INFO: <span>SOME INFO HERE</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">@lang('user.about')</a>
                        </li>
                        @if($user->hasCompany())
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('companies.show', ['company' => $user->company])}}">@lang('user.company')</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @can('edit', $user)
                <div class="col-md-2">
                    <a class="btn btn-outline-dark" href="{{route('users.edit', ['user' => $user])}}">
                        @lang('user.editProfile') </a>
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
                                <label>@lang('user.name')</label>
                            </div>
                            <div class="col-md-6">
                                <p> {{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>@lang('user.email')</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @auth
        @include('partials.modals.report-modal', ['model' => $user])
    @endauth
@endsection

