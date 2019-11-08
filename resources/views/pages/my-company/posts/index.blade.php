@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.my-company.partials.sidebar')
        <div class="col">
            <h2>Posts</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('post.columns.title')</th>
                    <th>@lang('post.columns.description')</th>
                    <th>@lang('post.columns.category')</th>
                    <th>@lang('post.columns.publishedAt')</th>
                    <th>@lang('post.columns.price')</th>
                    <th>@lang('common.show')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->getLimitedColumn($post->title, 20)}}</td>
                        <td>{{$post->getLimitedColumn($post->description, 20)}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->formatCreatedAtDate()}}</td>
                        <td>{{$post->getFormattedPrice()}}</td>
                        <td>
                            <a href="{{route('posts.show', ['post' => $post, 'category' => $post->category])}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                                <br>
                                @lang('common.show')
                            </a>
                        </td>
                    </tr>
                </tbody>
                @empty
                    <div class="alert alert-primary">
                         @lang('sentence.company.noPosts')
                        <a href="{{route('posts.create')}}"> {{strtolower(trans('common.here'))}}</a>
                    </div>
                @endforelse
            </table>
        </div>
    </div>

@endsection
