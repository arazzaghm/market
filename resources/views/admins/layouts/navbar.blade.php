<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
{{--            <img--}}
{{--                src="{{auth()->user()->getFirstMedia('avatar') ? auth()->user()->getFirstMediaUrl('avatar') : asset('admins/images/user.png') }}"--}}
{{--                width="48" height="48" alt="User"/>--}}
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">{{auth()->user()->name}}</div>
            <div class="email">{{auth()->user()->email}}</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="material-icons">people</i>
                    <span>Users</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{\Carbon\Carbon::now()->year}} <a href="{{url('/')}}">Market</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>
