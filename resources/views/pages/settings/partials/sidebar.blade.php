<div class="col-4">

    <h2>My settings</h2>
    <ul class="list-group">
        <a href="{{route('settings.index')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'settings.index' ? 'text-dark' :''}}">
            <li class="list-group-item">My information</li>
        </a>
        <a href="{{route('settings.statistics')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'settings.statistics' ? 'text-dark' :''}}">
            <li class="list-group-item">My statistics</li>
        </a>
        <a href="{{route('questions.index')}}"
           class="text-decoration-none {{\Request::route()->getName() == 'questions.index' ? 'text-dark' :''}}">
            <li class="list-group-item">Support
                @if($authHasNewAnswers)
                    <span class="badge badge-danger ">{{$countedAuthNewAnswers}}</span>
                @endif
            </li>
        </a>
    </ul>
</div>
