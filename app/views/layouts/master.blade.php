<!DOCTYPE html> 
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
	@include('slices.head')
</head>
<body class="page-{{ (Request::segment(1) == NULL ? 'home' : Request::segment(1)) }}">
<div class="container">
    @if (Request::segment(1) != NULL)
    <div class="masthead">
        <h3 class="muted">Flip<i class="icon-beaker icon-flip-vertical"></i>Test</h3>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li{{ (Request::segment(1) == NULL) ? ' class="active"' : ''}}><a href="{{ URL::to('/') }}"><i class="icon-home"></i> Home</a></li>
                        
                        @if (Auth::check())
                        <li{{ (Request::segment(1) == 'apps')? ' class="active"' : ''}}><a href="{{ URL::to('apps') }}"><i class="icon-mobile-phone"></i> Apps</a></li>
                        <li{{ (Request::segment(1) == 'tests') ? ' class="active"' : ''}}><a href="{{ URL::to('tests') }}"><i class="icon-bar-chart"></i> Tests</a></li>
                        @endif

                        <li{{ (Request::segment(1) == 'about') ? ' class="active"' : ''}}><a href="{{ URL::to('about') }}"><i class="icon-info"></i> About</a></li>
                        <li{{ (Request::segment(1) == 'contact') ? ' class="active"' : ''}}><a href="{{ URL::to('contact') }}"><i class="icon-envelope"></i> Contact</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.navbar -->
    </div>
    @endif

    @yield('content')

    <hr>
    <div class="footer">
      <p>
        &copy; FlipTest 2013
        @if (Auth::check())
            &bull; <a href="{{ URL::to('auth/logout') }}"><i class="icon-lock"></i> Logout</a>
        @endif
      </p>
    </div>
</div> <!-- /container -->

@section('scripts')
    {{ HTML::script('js/jquery.min.js') }}
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
@show
</body>
</html>
