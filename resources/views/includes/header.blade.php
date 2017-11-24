<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">
                LoL Bestiary
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('champions') }}">Champions</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if (Auth::user()->admin)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('manage.dashboard') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Admin Dashboard</a>
                                    
                                </li>
                                 <li>
                                	<a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Settings</a>
                                </li>
                                <li>
                                	<a href="{{ route('user.logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                           		 <li>
                                	<a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
