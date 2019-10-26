<section id="footer" class="mt-5">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left justify-content-center">
            @auth
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick user navigation</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('home')}}"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="{{route('bookmarks.index')}}"><i class="fa fa-angle-double-right"></i>My bookmarks</a></li>
                    </ul>
                </div>
            @endauth
            @guest
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Register & login</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('login')}}"><i class="fa fa-angle-double-right"></i>Login</a></li>
                        <li><a href="{{route('register')}}"><i class="fa fa-angle-double-right"></i>Register</a></li>
                    </ul>
                </div>
            @endguest
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Contact us</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Say us about your problem</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Visit </a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i
                                class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            </hr>
        </div>
    </div>
</section>
