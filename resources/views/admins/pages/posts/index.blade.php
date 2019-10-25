@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Posts</h2>
                    <h5>Total posts: {{ App\Models\Post::count()}} </h5>
                </div>

                <div class="body table-responsive">
                    {{ $posts->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>VIEWED TIMES</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>LOCATION</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td><a href="{{route('posts.show', [
                                'post' => $post,
                                'category' => $post->category
                                ])}}">{{$post->title}}</a></td>
                                <td>{{$post->viewed_times}}</td>
                                <td>Category</td>
                                <td>{{$post->price}}</td>
                                <td>{{$post->location}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>Actions</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
