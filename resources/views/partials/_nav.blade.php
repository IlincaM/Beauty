
<nav class="navbar navbar-inverse transparentMenu">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Beauty Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul id="sdt_menu" class="nav navbar-nav sdt_menu ">
                <li >
                    <a href="{{ action('PagesController@getIndex') }}">
                        <img src="{{URL::asset('images/studio.jpg')}}" alt=""/>
                        <span class="sdt_active"></span>
                        <span class="sdt_wrap ">
                            <span class="sdt_link">Home</span>
                            <span class="sdt_descr">Hello Beauty!</span>
                        </span>
                    </a>

                </li>

                <li>
                    <a href="{{ action('PagesController@getAboutMe') }}">
                        <img src="{{URL::asset('images/1.jpg')}}" alt=""/>

                        <span class="sdt_active"></span>
                        <span class="sdt_wrap ">
                            <span class="sdt_link">About me</span>
                            <span class="sdt_descr">Get to know me</span>
                        </span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('BlogController@getIndexHair') }}">
                        <img src="{{URL::asset('images/2.jpg')}}" alt=""/>
                        <span class="sdt_active"></span>
                        <span class="sdt_wrap">
                            <span class="sdt_link">Hair styles</span>
                            <span class="sdt_descr">Love your hair</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('BlogController@getIndexMakeUp') }}">
                        <img src="{{URL::asset('images/3.jpg')}}" alt=""/>
                        <span class="sdt_active"></span>
                        <span class="sdt_wrap">
                            <span class="sdt_link">MakeUp</span>
                            <span class="sdt_descr">MakeUp is art</span>
                        </span>
                    </a>
                </li>
                <li class="blur">
                    <a href="{{ action('BlogController@getIndexNails') }}">
                        <img src="{{URL::asset('images/4.jpg')}}" alt=""/>
                        <span class="sdt_active"></span>
                        <span class="sdt_wrap">
                            <span class="sdt_link">Nails</span>
                            <span class="sdt_descr">Stay fabulous</span>
                        </span>
                    </a>
                </li>
                <li class="blur">
                    <a href="{{ action('PagesController@getContact') }}">
                        <img src="{{URL::asset('images/envelope.jpg')}}" alt=""/>
                        <span class="sdt_active"></span>
                        <span class="sdt_wrap">
                            <span class="sdt_link">Contact Me</span>
                            <span class="sdt_descr">Write to me</span>
                        </span>
                    </a>
                </li>
            </ul>
            @if(Auth::check() && Auth::user()->isAdmin())
            <ul class=" nav navbar-nav navbar-right me ">

                <li  class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Hello {{Auth::user()->name}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ action('PostController@index') }}">
                                View all articles
                            </a>
                        </li>
                        <li>
                            <a href="{{ action('PostController@create') }}">
                                Create Article
                            </a>
                        </li>
                        <li>
                            <a href="{{route('logout') }}">
                                Logout
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
            @elseif(Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hello {{Auth::user()->name}}</a></li> 
                <li>
                    <a href="{{route('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
            @else

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="{{route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            @endif  
        </div>
    </div>
</nav>