<div class="card mb-3 text-dark">
    <div class="row no-gutters">
        <div class="col-md-4">
            <a href="{{route('posts.show', [
                'post' => $bookmark->post,
                'category' => $bookmark->post->category
            ])}}">
                <img src="{{$bookmark->post->getPictureUrl('card')}}" class="card-img" alt="{{$bookmark->post->title}}">
            </a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            {{$bookmark->post->getLimitedColumn($bookmark->post->title)}}
                        </h5>
                        <p class="card-text">
                            <b>Description: </b>
                            {{$bookmark->post->getLimitedColumn($bookmark->post->description)}}
                        </p>
                        <p class="card-text">
                            <b>Title: </b>
                            {{$bookmark->post->getFormattedPrice()}}
                        </p>
                        <p class="card-text">
                            <b>Company: </b>
                            <a href="{{route('companies.show', ['company' => $bookmark->post->company])}}">
                                {{$bookmark->post->company->name}}
                            </a>
                        </p>
                    </div>
                    <div class="col">
                        <form action="{{route('bookmarks.store', [
                            'post' => $bookmark->post,
                        ])}}" method="POST">
                            @csrf
                            <button class="btn btn-dark text-dark">
                                <i class="fa fa-bookmark text-white"></i>
                            </button>
                        </form>
                        <a class="btn btn-primary mt-2" href="{{route('posts.show', [
                            'post' => $bookmark->post,
                            'category' => $bookmark->post->category
                        ])}}">
                            @lang('common.show')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
