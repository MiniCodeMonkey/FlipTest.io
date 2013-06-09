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
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a href="{{ URL::route('apps.show', array(1)) }}" class="btn btn-primary">Go to app</a></p>
				</div>
			</div>
		</li>

		<li class="span6">
			<div class="thumbnail">
				<i class="icon-plus" style="font-size: 6.9em; text-align: center; display: block;"></i>
				<div class="caption">
					<h3>Add new app</h3>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a href="{{ URL::route('apps.show', array(1)) }}" class="btn btn-primary">Add app</a></p>
				</div>
			</div>
		</li>
	</ul>
</div>

@stop