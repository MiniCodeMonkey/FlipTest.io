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

	@yield('content')

    @section('scripts')
	    {{ HTML::script('js/jquery.min.js') }}
    @show
</body>
</html>
