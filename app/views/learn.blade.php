@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<p class="lead">We're not quite ready to show FlipTest to the world yet, but please sign up if you would like to get notified when we get there!</p>

@foreach ($errors->all(':message') as $error)
<div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>{{ $error }}
</div>
@endforeach

@if (Session::has('registered') && Session::get('registered') == true)
<div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#">×</a>Thank you! We will keep you updated.
</div>
@endif

{{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@postLearn')) }}
    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email">
        </div>
    </div>

    <button type="submit" class="btn btn-large btn-success pull-right">Submit</button>

    <div class="clearfix"></div>
{{ Form::close() }}

@stop