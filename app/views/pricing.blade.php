@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<div class="row-fluid">
<div class="span4">
  <div class="well">
    <h2 class="text-info">(Flip)TestDrive</h2>
    <ul>
      <li>1 app</li>
      <li>5 tests</li>
      <li>1 user account</li>
      <li>Online doumentation</li>
    </ul>          
    <p>Don't want to commit to a plan without knowing what you're getting? We don't blame you. Take FlipTest for a test drive.</p>
    <hr>
    <h3>$ FREE</h3>
    <hr>
    <p><a class="btn btn-large" href="#"><i class="icon-ok"></i> Select plan</a></p>
  </div>
</div>
<div class="span4">
  <div class="well">
    <h2 class="muted">Developer</h2>
    <ul>
      <li>10 apps at a time</li>
      <li>20 tests per app</li>
      <li>1 user account</li>
      <li>Email and Skype support</li>
    </ul>          
    <p>Great for developers who don't want to rely on their gut for what will lead to the most revenue and/or conversions.</p>
    <hr>
    <h3><i class="icon-phone"></i> Call Us for Pricing</h3>
    <hr>
    <p><a class="btn btn-success btn-large" href="#"><i class="icon-ok"></i> Select plan</a></p>
  </div>
</div>
<div class="span4">
  <div class="well">
    <h2 class="text-warning">Enterprise</h2>
    <ul>
      <li>50 apps at a time</li>
      <li>Unlimited tests per app</li>
      <li>Unlimited user accounts</li>
      <li>Email, Skype, and Gchat support, plus our personal cell phone numbers</li>
    </ul>          
    <p>Perfect for agencies and brands that want to run a lot of different tests.</p>
    <hr>
    <h3><i class="icon-phone"></i> Call Us for Pricing</h3>
    <hr>
      <p><a class="btn btn-large" href="#"><i class="icon-ok"></i> Select plan</a></p>
  </div>
</div>

@stop