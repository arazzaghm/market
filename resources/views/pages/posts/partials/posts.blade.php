<div class="row">
    @forelse($posts as $post)
        @can('view', $post)
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
                        <small class="text-muted">@lang('post.columns.publishedAt'): {{$post->formatCreatedAtDate()}}</small>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('posts.show', [
                            'category' => $post->category,
                            'post'=> $post
                        ])}}" class="btn btn-primary">@lang('common.show')</a>
                    </div>
                    @endcan

                </div>
            </div>
            @empty
                <div class="alert alert-primary" role="alert">
                    Sorry, there is no posts found!
                </div>
            @endforelse

</div>
