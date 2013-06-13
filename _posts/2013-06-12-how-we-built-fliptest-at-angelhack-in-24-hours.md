---
layout: post
title: "How we built FlipTest at AngelHack in 24 hours"
tagline: "A/B testing framework for iOS"
category: 
tags: [introduction, how, tech]
---
{% include JB/setup %}

There are several solutions out there if you want to A/B test your iOS app. Unfortunately many of them requires you to write tests into your code and resubmit to the App Store (like clutch.io) or mess with various tools to perform just a simple test (like other.com)

We decided to take a radically different approach. Here is what we learned.

We started out by defining our requirements; it should be easy to implement into an existing iOS project and it should be possible to create tests on the fly - even for non tech-savvy people.

This led us to building a web interface in a similar fashion as Optimizely and Unbounce.

The TestFlip Framework works by building a full overview of the app's ViewControllers and view hierarchies and sending this information to the TestFlip.io website via a simple REST API. This allows the website to visualize the different ViewControllers and provide an easy way for users to A/B test changes to elements such as labels and buttons.

Periodically the FlipTest integrated app will then ask for a testing profile via the REST API and make any changes to the UI if necessary, this also enables the app to track views and clicks, so a conversion rate can be calculated and visualized on the website.

The view-hierarchy generation (to be sent to the server) and the view-injection process (making changes based on the A/B testing profile) is implemented using method swizzling. This allows us to very lightly inject into the existing code base of the app at runtime and perform view updates and traversal in a very efficient way.

For a quick overview of what this looks like, check this awesome video that @willsummers made just before we handed the project in:


So what do you think about this approach? And is this something you would like to be able to use in your app? We would love to hear some feedback and comments.

TestFlip.io was built by @MicheleWalk, @MathiasHansen and @WillSummers at AngelHack DC June 8-9 2013