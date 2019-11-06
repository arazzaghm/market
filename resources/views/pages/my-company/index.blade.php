@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.my-company.partials.sidebar')
        <div class="col-md-8">
            <h1>Hello!</h1>
            <h3>This is the main page of your company control panel!</h3>
            <h4>You can check the statistic of your company here.</h4>
            <div class="row">
                <div class="col-4">
                    <div class="card square-card">
                        <div class="card-header">
                            Company posts
                        </div>
                        <div class="card-body">
                            Total posts: <b>{{$totalPosts}}</b>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card square-card">
                        <div class="card-header">
                            Today posts
                        </div>
                        <div class="card-body">
                            Today posts: <b>{{$todayPosts}}</b>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
    </div>
@endsection
