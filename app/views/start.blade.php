@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<h3>To get started with FlipTest, we first need some info</h3>

<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="appName">Name of App</label>
    <div class="controls">
      <input type="text" id="appName" placeholder="Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="appId">Apple Identifier</label>
    <div class="controls">
      <input type="text" id="appId" placeholder="AppleId">
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
  <h4>Great! Now just paste this line of code into your app</h4>
      <div class="row">
          <div class="span6 offset3">
              <p>
                  <code>LKJHASD2890ASD</code>
              </p>
          </div>
      </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Set Up First Test</button>
    </div>
  </div>
</form>

@stop