<div class="col-md-4 mb-2">
    <h2>My settings</h2>
    <ul class="list-group">
        <a href="{{route('settings.index')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'my-company.index' ? 'text-dark' :''}}">
            <li class="list-group-item">Homepage</li>
        </a>
        <a href="{{route('settings.statistics')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'settings.statistics' ? 'text-dark' :''}}">
            <li class="list-group-item">Company information</li>
        </a>
        <a href="{{route('questions.index')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'questions.index' ? 'text-dark' :''}}">
            <li class="list-group-item">Company posts</li>
        </a>
    </ul>
</div>
