<div class="col-md-4 mb-2">
    <h2>My settings</h2>
    <ul class="list-group">
        <a href="{{route('settings.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'settings.index' ? 'active' :''}}">
                My information
            </li>
        </a>
        <a href="{{route('settings.statistics')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'settings.statistics' ? 'active' :''}}">
                My statistics
            </li>
        </a>
        <a href="{{route('questions.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'questions.index' ? 'active' :''}}">
                Support
                @if($authHasNewAnswers)
                    <span class="badge badge-danger ">{{$countedAuthNewAnswers}}</span>
                @endif
            </li>
        </a>
    </ul>
</div>
