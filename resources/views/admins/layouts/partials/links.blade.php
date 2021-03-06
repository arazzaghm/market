<ul class="list">
    <li class="header">MAIN NAVIGATION</li>
    <li>
        <a href="{{ route('admin.users.index') }}">
            <i class="material-icons">people</i>
            <span>Users</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.posts.index') }}">
            <i class="material-icons">notes</i>
            <span>Posts</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.categories.index') }}">
            <i class="material-icons">category</i>
            <span>Categories</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.reports.index') }}">
            <i class="material-icons">report</i>
            <span>Reports</span><span class="badge bg-red white-text">{{$totalNotViewedReports}} Unread</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.report-types.index') }}">
            <i class="material-icons">report</i>
            <span>Report types</span>
        </a>
    </li>

    <li>
        <a href="{{route('admin.questions.index')}}">
            <i class="material-icons">
            question_answer
            </i>
            <span>Users questions</span><span class="badge bg-red white-text">{{$totalOpenedQuestions}} opened</span>
        </a>
    </li>

    <li>
        <a href="{{route('admin.popular-questions.index')}}">
            <i class="material-icons">
                contact_support
            </i>
            <span>Popular questions</span>
        </a>
    </li>
</ul>
