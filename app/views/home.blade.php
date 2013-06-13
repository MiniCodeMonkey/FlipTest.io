@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

{{--
<ul class="ribbons">
	<li><a href="{{ URL::to('pricing') }}"><img src="img/pricing.png" alt="Pricing"></a></li>
	<li><a href="{{ URL::to('about') }}"><img src="img/about.png" alt="About"></a></li>
</ul>
--}}

<div class="jumbotron">
	<h1>Flip<i class="icon-beaker icon-flip-vertical"></i>Test</h1>
	<p class="lead">Easily create and manage A/B tests for iOS apps</p>

	@if (Auth::check())
		<a class="btn btn-large btn-success" href="{{ URL::to('apps') }}">Apps</a>
		<a class="btn btn-large btn-success" href="{{ URL::to('tests') }}">Tests</a>
	@else
		<a class="btn btn-large btn-success" href="{{ URL::to('about') }}">About</a>
		<a class="btn btn-large btn-success" href="{{ URL::to('learn') }}">Learn more</a>
	@endif

	<iframe width="560" height="315" class="video-embed" src="http://www.youtube.com/embed/Jl7wKaMWOew?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

<hr>

<div class="row-fluid">
	<div class="span4">
		<h2><i class="icon-check"></i> No Major Code Changes Necessary</h2>
		<p>Other iOS A/B testing services require you to make significant changes to your code. With FlipTest, you only need to drop in one line of code. That's it.</p>
	</div>
	<div class="span4">
		<h2><i class="icon-check"></i> Create and Monitor Tests Online</h2>
		<p>Create and monitor the results of your A/B tests online through a simple web interface.</p>
	</div>
	<div class="span4">
		<h2><i class="icon-check"></i> No Technical Expertise Required</h2>
		<p>With FlipTest, even non-developers can easily create and monitor A/B tests. No coding necessary.</p>
	</div>
</div>

@stop