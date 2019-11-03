<div class="row">
    @forelse($posts as $post)
        @can('view', $post)
            <div class="col-6 mt-2">
                <div class="card">
                    <div class="row no-gutters">
                        <a href="{{route('posts.show', [
                    'category' => $post->category,
                    'post'=> $post
                    ])}}">
                            <img src="{{$post->getPictureUrl()}}"
                                 class="card-img-top {{$post->isArchived() ? 'grayscale' : ''}} "
                                 alt="{{$post->title}}">
                        </a>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->description}}</p>
                                <p class="card-text">{{$post->price}} {{$post->currency->name}} </p>
                                <p class="card-text">{{$post->category->icon_name}}</p>
                                @if($post->isArchived())
                                    <p class="card-text text-danger">Achieved</p>
                                @endif
                                <small class="text-muted">Published on {{$post->formatCreatedAtDate()}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            @empty
                <div class="alert alert-primary" role="alert">
                    Sorry, there is no posts found!
                </div>
            @endforelse
</div>

