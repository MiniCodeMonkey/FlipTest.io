@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<h2>{{ $test->name }}</h2>
<h4>Test in <em>{{ $test->viewcontroller->name }}</em> changing {{ $test->test_type }} to {{ $test->test_value }}</h4>
<p><em>
@if (time() < strtotime($test->expire))
	Expires {{ $test->getExpiresRelative() }}
@else
	Test completed on {{ $test->expire }}
@endif
</em></p>

<canvas id="linechart" width="700" height="400"></canvas>

<table class="table table-striped">
	<tr>
		<th>Test Group</th>
		<th>Impressions</th>
		<th>Conversions</th>
		<th>Conversion rate</th>
	</tr>

	<tr>
		<td style="background-color: #1f77b4;">A</td>
		<td>{{ $aviews }}</td>
		<td>{{ $agoals }}</td>
		<td>{{ round($arate, 2) }}%</td>       
	</tr>

	<tr>
		<td style="background-color: #ff7f0e;">B</td>
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