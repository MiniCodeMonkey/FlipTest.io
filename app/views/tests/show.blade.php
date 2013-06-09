@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<h2>{{ $test->name }}</h2>
<h4>Test in <em>{{ $test->viewcontroller->name }}</em> changing {{ $test->test_type }} to {{ $test->test_value }}</h4>
<p>
	<strong>Test started at:</strong> {{ date('F j, Y, g:i a', strtotime($test->created_at)) }}
</p>

<p>
	@if (time() < strtotime($test->expire))
		<strong>Test will be complete:</strong> {{ $test->getExpiresRelative() }}
	@else
		<strong>Test completed on:</strong> {{ date('F j, Y, g:i a', strtotime($test->expire)) }}
	@endif
</p>


@if (count($chart_data) <= 0)
	<p class="alert alert-warning graph-alert">There aren't enough impressions to show a graph yet. Why don't you <a href="{{ URL::route('apps.show', array(1)) }}">set up another test</a> while you're waiting for results to come in?</p>
@else
	<canvas id="linechart" width="700" height="400"></canvas>
	<hr />
@endif

<table class="table table-striped">
	<tr>
		<th>Test Group</th>
		<th>Description</th>
		<th>Impressions</th>
		<th>Conversions</th>
		<th>Conversion rate</th>
	</tr>

	<tr>
		<td style="background-color: rgba(31,119,180,0.5);">A</td>
		<td>{{{ $test->original_value }}}</td>
		<td>{{ $aviews }}</td>
		<td>{{ $agoals }}</td>
		<td>{{ round($arate, 2) }}%</td>       
	</tr>

	<tr>
		<td style="background-color: rgba(180,31,38,0.5);">B</td>
		<td>{{{ $test->test_value }}}</td>
		<td>{{ $bviews }}</td>
		<td>{{ $bgoals }}</td>
		<td>{{ round($brate, 2) }}%</td>       
	</tr>
</table>

@stop

@section('scripts')
	@parent
	<script language="javascript">
	var data = {{ json_encode($chart_data) }};
	</script>
	{{ HTML::script('js/Chart.min.js') }}
	{{ HTML::script('js/test.js') }}
@stop