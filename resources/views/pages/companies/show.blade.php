@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2><b>{{$company->name}}</b></h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <img src="{{$company->getLogoUrl()}}" alt="{{$company->name}}">
                </div>
                <div class="col-lg-8 col-md-12">
                    <p><i class="fa fa-inbox"></i>@auth {{$company->email}} @else Log in or register to view the
                        credentials @endauth</p>
                    <p><i class="fa fa-phone"></i> @auth {{$company->getFormattedPhoneNumber()}} @else Log in or
                        register to view the
                        credentials @endauth</p>
                    <p>{{$company->description}}</p>
                    <p>
                        Owner:
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
                <h3>Posted by <b>{{$company->name}}</b></h3>
                <div class="row">
                    @forelse($recentPosts as $post)
                        <div class="card mr-1 col-4" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->description}}</p>
                                <p class="card-text">{{$post->price}} {{$post->currency->name}}</p>
                                <a href="{{route('posts.show', ['post' => $post, 'category' => $post->category])}}"
                                   class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-primary">Sorry, this company has no posts yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @auth
        @include('partials.modals.report-modal', ['model' => $company])
    @endauth
@endsection
