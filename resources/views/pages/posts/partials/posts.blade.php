<div class="card-deck row">
    @forelse($posts as $post)
        @can('view', $post)
            <div class="col-6 mb-2">
                <div class="card">
                    <a href="{{route('posts.show', [
                    'category' => $post->category,
                    'post'=> $post
                    ])}}">
                        <img src="{{$post->getPictureUrl()}}" class="card-img-top" alt="{{$post->title}}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text">{{$post->price}} {{$post->currency->name}} </p>
                        <p class="card-text">{{$post->category->icon_name}}</p>
                        @if($post->isArchived())
                            <p class="card-text text-warning">Achieved</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Published on {{$post->formatCreatedAtDate()}}</small>
                    </div>
                </div>
            </div>
        @endcan
    @empty
        <div class="alert alert-primary" role="alert">
            Sorry, there is no posts found!
        </div>
    @endforelse
</div>
