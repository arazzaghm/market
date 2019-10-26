<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <a class="btn btn btn-success  @guest {{'disabled'}} @endguest" href="{{route('posts.create')}}"> <i
                        class="fa fa-plus"></i> Add new
                    offer</a>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <button type="button" class="btn nav-link" data-toggle="modal" data-target="#loginModal">
                            {{ __('Login') }}
                        </button>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" data-toggle="modal"
                                    data-target="#registerModal">
                                {{ __('Register') }}
                            </button>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('users.show', ['user' => Auth::user()])}}" class="dropdown-item">
                                My profile
                            </a>

                            <a href="{{route('bookmarks.index')}}" class="dropdown-item">
                                My bookmarks
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
