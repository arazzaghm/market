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

            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
            </ul>

            <ul class="navbar-nav ml-auto">
                <form class="form-inline mt-2 mt-md-0" action="{{route('search')}}">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="title">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
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
                            <img src="{{auth()->user()->getAvatarUrl()}}" style="width: 40px; height: 40px;"
                                 class="rounded-circle" alt="">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('users.show', ['user' => Auth::user()])}}" class="dropdown-item">
                                <i class="fa fa-user"></i> My profile
                            </a>

                            @if($authHasCompany)
                                <a href="{{route('my-company.index')}}" class="dropdown-item">
                                    <i class="fa fa-compass"></i> My company
                                </a>
                            @endif
                            <a href="{{route('bookmarks.index')}}" class="dropdown-item">
                                <i class="fa fa-bookmark"></i> My bookmarks
                            </a>

                            <a href="{{route('settings.index')}}" class="dropdown-item">
                                <i class="fa fa-cog"></i> My settings
                            </a>

                            <a href="{{route('questions.index')}}" class="dropdown-item">
                                @if($authHasNewAnswers)
                                    <span class="badge badge-danger">{{$countedAuthNewAnswers}}</span>
                                @else
                                    <i class="fa fa-question-circle"></i>
                                @endif
                                Help
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
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
