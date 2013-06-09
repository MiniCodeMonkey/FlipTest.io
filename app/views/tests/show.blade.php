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

@stop

@section('scripts')
	@parent
	<script language="javascript">
	var data = {{ json_encode($chart_data) }};
	</script>
	{{ HTML::script('js/Chart.min.js') }}
	{{ HTML::script('js/test.js') }}
@stop