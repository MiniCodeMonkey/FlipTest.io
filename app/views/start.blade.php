@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<h3>To get started with FlipTest, we first need some info</h3>

<form class="form-horizontal">
    <div class="control-group">
        <label class="control-label" for="appName">App Name</label>
        <div class="controls">
            <input type="text" id="appName" placeholder="My iOS App">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="appId">App Identifier</label>
        <div class="controls">
            <input type="text" id="appId" placeholder="com.acme.myiosapp">
        </div>
    </div>
    <h4>Create account</h4>
    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input type="text" id="email" placeholder="Email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" placeholder="Password">
        </div>
    </div>
    <h4>Great! Now just paste this line of code into <code style="display: block-inline;">- (BOOL)application:didFinishLaunchingWithOptions:</code> in your app delegate.</h4>
    <p>
        <code>[[FlipTest currentFlipTest] goAhead:@"LKJHASD28-90ASDWMFVHTSD7R3FNK22-QNRUYFEDCSVTK"];</code>
    </p>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Set Up First Test</button>
        </div>
    </div>
</form>

@stop