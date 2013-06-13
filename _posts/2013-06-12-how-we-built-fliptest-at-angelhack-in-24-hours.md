---
layout: post
title: "How we built FlipTest at AngelHack in 24 hours (A/B testing framework for iOS)"
category: Introduction
tags: [introduction, how, tech]
---
{% include JB/setup %}

There are a couple solutions out there if you want to A/B test your iOS app. Unfortunately, many of them require you to write tests into your code and resubmit to the App Store (like [clutch.io](http://clutch.io)) or mess with various tools to perform just a simple test (like [pathmapp.com](https://pathmapp.com/))

We decided to take a radically different approach. Here is what we learned.

We started out by defining our requirements: it should be easy to implement into an existing iOS project without re-submitting to the App Store and it should be possible to create tests on the fly - even for non tech-savvy people.

This led us to building a web interface inspired by [Optimizely](http://optimizely.com) and [Unbounce](http://unbounce.com).

![UI](/assets/fliptest-ui.png)

The TestFlip Framework works by building a full overview of the app's ViewControllers and view hierarchies and sending this information to the [TestFlip.io](http://testflip.io) website via a simple REST API. This allows the website to visualize the different ViewControllers and provide an easy way for users to A/B test changes to elements such as labels and buttons.

![FlipTest REST Flowchart/Sequence Diagram](/assets/fliptest-flowchart.png)

The FlipTest integrated app will then periodically ask for a testing profile via the REST API and make any changes to the UI if necessary. This also enables the app to track uinque views and clicks so a conversion rate can be calculated and visualized on the website.

The view-hierarchy generation (to be sent to the server) and the view-injection process (making changes based on the A/B testing profile) is implemented using method swizzling. This allows us to very lightly inject into the existing code base of the app at runtime and perform view updates and traversal in a very efficient way.

We currently show simple conversion rates visualized on a line chart, we're looking to improve this along the way by adding more intelligent feedback for the collected data.

![Test Results](/assets/fliptest-charts.png)

For a quick overview of what all this looks like, check this awesome video that [@willsummers](http://twitter.com/willsummers) made just before we handed the project in:

<iframe width="560" height="315" src="http://www.youtube.com/embed/Jl7wKaMWOew?rel=0" frameborder="0" allowfullscreen="1"> </iframe>

So what do you think about this approach? And is this something you would like to be able to use in your app? We would love to hear some feedback and comments.

*[TestFlip.io](http://testflip.io) was built by [@MicheleWalk](http://twitter.com/MicheleWalk), [@MathiasHansen](http://twitter.com/MathiasHansen) and [@willsummers](http://twitter.com/willsummers) at [AngelHack DC](http://angelhack.com) June 8-9 2013*