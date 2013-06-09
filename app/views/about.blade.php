@extends('layouts.master')

@section('title')
  FlipTest
@stop

@section('content')

<h3>About FlipTest</h3>
<p>FlipTest allows you to run A/B tests on iOS apps without having to re-submit the app to the App Store or make significant modifications to your code. It only requies adding a <strong>single</strong> line of code to your iOS app. The SDK does the rest.
  <div style="margin-left:30px;">
    <p><i class="icon-remove"></i> No extensive editing of your existing code base.</p>
    <p><i class="icon-remove"></i> No renaming variables.</p>
    <p><i class="icon-remove"></i> No creating two versions of your story board.</p>
    <p><i class="icon-remove"></i> No waiting for App Store approval.</p>
    <p><i class="icon-remove"></i> No waiting for users to update your app.</p>
    <p><i class="icon-check"></i> Run tests instantly.</p>
    <p><i class="icon-check"></i> Real-time results.</p>
    <p><i class="icon-check"></i> User-friendly web interface.</p>
    <p><i class="icon-check"></i> Even non-developers can run tests.</p>
  </div>
  <p>(Yes, it's really that simple.)</p>
  <p>Tests can be created and monitored through a web interface. Perfect for agencies, brands, and developers. </p>
  <p>FlipTest was created in 24 hours during the <a href="http://angelhack.com/">2013 Washington, DC AngelHack.</a></p>
  <h3>Team FlipTest</h3>
  <p><strong>Mathias Hansen</strong>, Developer</p>
  <iframe src="http://ghbtns.com/github-btn.html?user=MINIcodemonkey&type=follow"
  allowtransparency="true" frameborder="0" scrolling="0" width="200" height="20"></iframe>
  <a href="https://twitter.com/MathiasHansen" class="twitter-follow-button" data-show-count="false">Follow @MathiasHansen</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <p><strong>Michele Hansen</strong>, Product/Idea</p>
  <a href="https://twitter.com/MicheleWalk" class="twitter-follow-button" data-show-count="false">Follow @MicheleWalk</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <p><strong>Will Summers</strong>, Designer</p>
  <a href="https://twitter.com/WillSummers" class="twitter-follow-button" data-show-count="false">Follow @WillSummers</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

@stop
