@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<div class="row-fluid">
	<ul class="thumbnails">
		<li class="span6">
			<div class="thumbnail">
				<img src="{{ URL::to('img/opennearby.png') }}" alt="What's Open Nearby?">
				<div class="caption">
					<h3>What's Open Nearby?</h3>
					<p>This is just the default demonstration app to show how FlipTest works, all user accounts will have this app configured per default.</p>
					<p><a href="{{ URL::route('apps.show', array(1)) }}" class="btn btn-primary">Go to app</a></p>
				</div>
			</div>
		</li>

		<li class="span6">
			<div class="thumbnail">
				<i class="icon-plus" style="font-size: 6.9em; text-align: center; display: block;"></i>
				<div class="caption">
					<h3>Add new app</h3>
					<p>While it could be really cool to support multiple apps and everything, we have to rememeber that this is just a Hackathon...</p>
					<p><a href="#" class="btn btn-primary">Add app</a></p>
				</div>
			</div>
		</li>
	</ul>
</div>

@stop