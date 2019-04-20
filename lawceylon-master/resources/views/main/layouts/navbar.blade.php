<header id="header" class="clearfix">
    <nav class="navbar navbar-default">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-inline">
                            <li><span><i class="fa fa-envelope-o"></i></span> <a href="mailto:lawceylon@gmail.com"> lawceylon@gmail.com</a></li>
                            <li><ul class="list-inline top-social">
                                    <li><a class="facebook" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="instagram" href="https://www.facebook.com/Law-Ceylon-1050483865124118/?modal=media_composer"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="user-section">			
                            <ul class="list-line">
                                @guest
                                    <li>
                                        @if (Route::has('register'))
                                            <a href="{{ route('reg') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ __('Register') }}</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}" class="btn btn-primary" aria-hidden="true">{{ __('Login') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #669999;">
                                            @if(Auth::user()->isUser())
                                                <a class="dropdown-item" href="{{ route('user') }}">
                                                    {{ __('Profile') }}
                                                </a>
                                            @elseif(Auth::user()->isLawyer())
                                                <a class="dropdown-item" href="{{ route('lawyer') }}">
                                                    {{ __('Profile') }}
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('admin') }}">
                                                    {{ __('Profile') }}
                                                </a>
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('contactus') }}">
                                                {{ __('Contact Us') }}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div><!-- user-section -->
                    </div>
                </div>
            </div>
        </div><!-- topbar -->

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                {{-- <a class="navbar-brand" href="{{ route('mainpage') }}"><img class="img-responsive" src="{{ asset('images/logo/log.png') }}" alt="Logo"></a> --}}
                <a class="navbar-brand" href="{{ route('mainpage') }}"><h3>Lawceylon</h3></a>
            </div><!-- /navbar-header -->
            
            <div class="navbar-right">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('mainpage') }}">Home</a></li>
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Services<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('downloads')}}">Download Forms</a></li>
                                <li><a href="{{route('mapsearch')}}">Advanced MapSearch</a></li>
                                <li><a href="{{route('gassette')}}">Gassettes</a></li>
                                <li><a href="{{route('vediochat')}}">Vedio Chat</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('tutorial')}}">Tutorial</a></li>
                        <li><a href="{{route('laws')}}">Law Reference</a></li>
                        <li><a href="{{route('aboutUs')}}">About Us</a></li>
                        <li><a href="{{route('contactus')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->