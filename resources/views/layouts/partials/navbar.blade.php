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
                <form action="{{route('search')}}">
                    <div class="form-group row mt-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="search" name="title"
                                   placeholder="Search">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-success btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </ul>

            <ul class="navbar-nav ml-auto">
                <a class="btn btn btn-danger  @guest {{'disabled'}} @endguest" href="{{route('posts.create')}}"> <i
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
                                <i class="fa fa-user"></i> My profile
                            </a>

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
