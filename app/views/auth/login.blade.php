@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

@if (Session::has('auth_error') && Session::get('auth_error'))
<p class="alert alert-error">Invalid e-mail and/or password</p>
@endif

{{ Form::open(array('class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Please sign in</h2>
	<input type="text" class="input-block-level" name="email" placeholder="Email address">
	<input type="password" class="input-block-level" name="password" placeholder="Password">
	<button type="submit" class="btn btn-large btn-success">Sign in</button>
{{ Form::close() }}

@stop