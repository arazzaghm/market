<div class="col-md-4 mb-2">
    <h2>My settings</h2>
    <ul class="list-group">
        <a href="{{route('my-company.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.index' ? 'active' :''}}">Homepage</li>
        </a>
        <a href="{{route('my-company.show')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.show' ? 'active' :''}}">Company information</li>
        </a>
        <a href="{{route('my-company.posts.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.posts.index' ? 'active' :''}}">Company posts</li>
        </a>
    </ul>
</div>
