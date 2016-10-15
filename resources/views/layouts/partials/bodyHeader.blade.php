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
                            <li><a href="{{ url('/') }}">Bikini</a></li>
                        </ul>
                        @if(Auth::check())
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ url('/') }}">{{Auth::user()->name}}</a></li>
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