<div class="col-md-4 mb-2">
    <h2>@lang('navbar.mySettings')</h2>
    <ul class="list-group">
        <a href="{{route('settings.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'settings.index' ? 'active' :''}}">
                @lang('navbar.settingsSidebar.myInformation')
            </li>
        </a>
        <a href="{{route('settings.statistics')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'settings.statistics' ? 'active' :''}}">
                @lang('navbar.settingsSidebar.myStatistics')
            </li>
        </a>
        <a href="{{route('questions.index')}}"
           class="text-decoration-none">
            <li class="list-group-item {{\Request::route()->getName() == 'questions.index' ? 'active' :''}}">
                @lang('navbar.settingsSidebar.support')
                @if($authHasNewAnswers)
                    <span class="badge badge-danger ">{{$countedAuthNewAnswers}}</span>
                @endif
            </li>
        </a>
    </ul>
</div>
