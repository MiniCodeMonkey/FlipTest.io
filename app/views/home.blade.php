@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<div class="jumbotron">
	<h1><i class="icon-beaker icon-flip-vertical"></i>FlipTest</h1>
	<p class="lead">Easily create and manage A/B tests for iOS apps</p>
	<a class="btn btn-large btn-success" href="#">Login</a>
	<a class="btn btn-large btn-success" href="#">Get started</a>
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
		<h2><i class="icon-check"></i> Non-Developer Friendly</h2>
		<p>With FlipTest, even non-developers can easily create and monitor A/B tests. No coding necessary.</p>
	</div>
</div>

@stop