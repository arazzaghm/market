<ul class="list-group">
    <a href="{{route('settings.index')}}"
       class="text-decoration-none {{\Request::route()->getName() == 'settings.index' ? 'text-dark' :''}}">
    <li class="list-group-item">My information</li>
    </a>
    <a href="{{route('settings.statistics')}}"
       class="text-decoration-none {{\Request::route()->getName() == 'settings.statistics' ? 'text-dark' :''}}">
        <li class="list-group-item">My statistics</li>
    </a>
</ul>
