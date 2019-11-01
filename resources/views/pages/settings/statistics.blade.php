@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-8">
            <h2>My statistic</h2>
            <div class="row">
                <div class="col">
                    <div class="card mt-1" style="width: 18rem;">
                        <div class="card-header">
                            Posts
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Posts statistic</h6>
                            <p class="card-text">
                                <span class="fa fa-file"></span>
                                Total created posts: {{$totalPosts}}
                            </p>
                            <p class="card-text">
                                <span class="fa fa-eye-slash"></span>
                                Total hidden posts: {{$totalHiddenPosts}}
                            </p>
                            <p class="card-text">
                                <span class="fa fa-archive"></span>
                                Total archived posts: {{$totalArchivedPosts}}
                            </p>
                            <p class="card-text">
                                <span class="fa fa-eye"></span>
                                Total views on posts: {{$totalPostsViews}}
                            </p>
                            <p class="card-text">
                                The most popular post:
                                <a href="{{route('posts.show', [
                                'post' => $theMostPopularPost,
                                'category' => $theMostPopularPost->category
                                ])}}" class="btn btn-primary">
                                    <span class="fa fa-eye"></span> Show
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-1" style="width: 18rem; height: 100%">
                        <div class="card-header">
                            Support
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Information about support</h6>
                            <p class="card-text">
                                <span class="fa fa-acquisitions-incorporated"></span>
                                Total reports: {{$totalReports}}
                            </p>
                            <p class="card-text">
                                <span class="fa fa-question"></span>
                                Total questions: {{$totalQuestions}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
