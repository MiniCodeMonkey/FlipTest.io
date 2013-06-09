@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<p class="lead">To get started with FlipTest, we just need to know a few things about your app.</p>

@foreach ($errors->all(':message') as $error)
<div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>{{ $error }}
</div>
@endforeach

{{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@postRegister')) }}
    <h4>App information</h4>
    <div class="control-group">
        <label class="control-label" for="appName">App Name</label>
        <div class="controls">
            <input type="text" id="appName" name="app_name" placeholder="My iOS App">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="appId">App Identifier</label>
        <div class="controls">
            <input type="text" id="appId" name="app_identifier" placeholder="com.acme.myiosapp">
        </div>
    </div>

    <h4>Create account</h4>
    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
    </div>

    <h4>Add FlipTest to your app</h4>
    <p>Great! Now you just need to a few last steps.</p>

    <ol class="app-steps">
        <li>Download the <a href="https://github.com/MiniCodeMonkey/FlipTestSDK/archive/master.zip">FlipTestSDK</a></li>
        <li>Drag <code>FlipTestSDK.xcodeproj</code> into your app project<br /><img src="img/fliptestsdk.png" alt="" /></li>
        <li>Make that the <code>-ObjC</code> flag is added to your app target in "Other Linker Flags"</li>
        <li>Add the following to <code>AppDelegate.m</code>
            <ul>
                <li><code>#import "FlipTest.h"</code> in the top</li>
                <li><code>[[FlipTest currentFlipTest] startFlipping:@"<span class="flip-code">LKJHASD28-90ASDWMFVHTSD7R3FNK22-QNRUYFEDCSVTK</span>"];</code> in your launch method</li>
            </ul>
        </li>
    </ol>

    <hr />

    <h2 class="pull-left"><i class="icon-thumbs-up"></i> That's it!</h2>
    <button type="submit" class="btn btn-large btn-success pull-right">Set Up First Test <i class="icon-double-angle-right"></i></button>

    <div class="clearfix"></div>
{{ Form::close() }}

@stop

@section('scripts')
  @parent
  {{ HTML::script('js/start.js') }}
@stop