@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<h2>{{ $test->name }}</h2>

<em>
@if (time() < strtotime($test->expire))
	Expires {{ $test->getExpiresRelative() }}
@else
	Test completed on {{ $test->expire }}
@endif
</em>

<h3>Controller</h3> {{ $test->viewcontroller->name }}
<h3>Test Type</h3> {{ $test->test_type }}
<h3>Value</h3> {{ $test->test_value }}

@stop