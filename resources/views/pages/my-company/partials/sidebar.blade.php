<div class="col-md-3 mb-2 col-sm-12" >
    <h2>@lang('company.settings')</h2>
    <ul class="list-group">
        <a href="{{route('my-company.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.index' ? 'active' :''}}">
                @lang('company.sidebar.home')
            </li>
        </a>
        <a href="{{route('my-company.show')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.show' ? 'active' :''}}">
                @lang('company.sidebar.information')
            </li>
        </a>
        <a href="{{route('my-company.posts.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'my-company.posts.index' ? 'active' :''}}">
                @lang('company.posts.posts')
            </li>
        </a>
    </ul>
</div>
