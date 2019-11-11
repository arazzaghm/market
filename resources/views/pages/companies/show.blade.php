@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2><b>{{$company->name}}</b></h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <img src="{{$company->getLogoUrl()}}" style="width: 300px; height: 300px;" alt="{{$company->name}}">
                </div>
                <div class="col-lg-8 col-md-12">
                    <p>
                        <i class="fa fa-inbox"></i>
                        @auth
                            {{$company->email}}
                        @else
                            @lang('company.credentials.logOrRegister')
                        @endauth
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        @auth
                            {{$company->getFormattedPhoneNumber()}}
                        @else
                            @lang('company.credentials.logOrRegister')
                        @endauth
                    </p>
                    <p>{{$company->description}}</p>
                    <p>
                        @lang('company.owner'):
                        <a href="{{route('users.show', ['user' => $company->user])}}">
                            {{$company->user->name}}
                        </a>
                    </p>
                    @auth
                        <p>
                            @include('partials.buttons.report-button')
                        </p>
                    @endauth
                </div>
            </div>
            <div class="card-footer">
                <h3>@lang('company.posts.postedBy') <b>{{$company->name}}</b></h3>
                <div class="row d-flex justify-content-center">
                    @forelse($recentPosts as $post)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{route('posts.show', [
                                    'category' => $post->category,
                                    'post'=> $post
                                ])}}">
                                    <img class="card-img-top" src="{{$post->getPictureUrl('card')}}" alt="">
                                </a>

                                <div class="card-body">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->description}}</p>
                                    <p class="card-text">{{$post->getFormattedPrice()}} </p>
                                    <p class="card-text">
                                        <i class="fa {{$post->category->getFaIconName()}}"></i>
                                        {{$post->category->getNameByLocale()}}
                                    </p>
                                    @if($post->isArchived())
                                        <p class="card-text text-danger">Achieved</p>
                                    @endif
                                    <small class="text-muted">@lang('post.columns.publishedAt')
                                        : {{$post->formatCreatedAtDate()}}</small>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('posts.show', [
                                        'category' => $post->category,
                                        'post'=> $post
                                    ])}}" class="btn btn-primary">@lang('common.show')</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-primary">@lang('company.posts.empty')</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @auth
        @include('partials.modals.report-modal', ['model' => $company])
    @endauth
@endsection
