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
            <span>Reports</span><span class="badge bg-red white-text">{{\App\Models\Report::countNotViewed()}} Unread</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.report-types.index') }}">
            <i class="material-icons">report</i>
            <span>Report types</span>
        </a>
    </li>
</ul>
