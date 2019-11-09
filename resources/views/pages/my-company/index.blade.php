@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.my-company.partials.sidebar')
        <div class="col-md">
            <h1>@lang('sentence.hello')!</h1>
            <h3>@lang('sentence.company.mainPage')!</h3>
            <h4>@lang('sentence.company.checkStats').</h4>
            <div class="row">
                <div class="col-4">
                    <div class="card square-card">
                        <div class="card-header">
                            @lang('company.posts.posts')
                        </div>
                        <div class="card-body">
                            @lang('company.posts.total'): <b>{{$totalPosts}}</b>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card square-card">
                        <div class="card-header">
                            @lang('company.posts.posts')
                        </div>
                        <div class="card-body">
                            @lang('company.posts.posts'): <b>{{$todayPosts}}</b>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
    </div>
@endsection
