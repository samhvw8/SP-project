<div class="header">
    <div class="header-bottom">
        <div class="container">
            <!--/.content-->
            <div class="content white">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1 class="navbar-brand"><a href="{{ url('/') }}">XYZ wear</a></h1>
                    </div>
                    <!--/.navbar-header-->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @if(Auth::check())
                                @if(Auth::user()->isAdmin())
                                    <li><a href="{{ route('pages.dashboard') }}">Dashboard</a></li>
                                @endif
                            @endif
                        </ul>
                        @if(Auth::check())
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('users.edit', Auth::user()->id) }}">{{Auth::user()->name}}</a>
                                </li>
                                <li><a href="{{ route('auth.logout') }}">
                                        <span class="glyphicon glyphicon-off"></span>

                                    </a></li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('auth.login') }}">Login</a>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('auth.register') }}">Register</a>

                            </ul>
                        @endif
                    </div>
                    <!--/.navbar-collapse-->
                </nav>
                <!--/.navbar-->
            </div>
        </div>
    </div>
</div>