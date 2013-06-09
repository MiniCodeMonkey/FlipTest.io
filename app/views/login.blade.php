@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<form class="form-signin">
	<h2 class="form-signin-heading">Please sign in</h2>
	<input type="text" class="input-block-level" placeholder="Email address">
	<input type="password" class="input-block-level" placeholder="Password">
	<label class="checkbox">
		<input type="checkbox" value="remember-me"> Remember me
	</label>
	<a href="{{ URL::to('apps') }}" class="btn btn-large btn-success">Sign in</a>
</form>

@stop