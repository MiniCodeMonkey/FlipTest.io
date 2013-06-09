@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

{{ $test->name }}
{{ $test->expire }}
{{ $test->app_id }}
{{ $test->controller_id }}
{{ $test->view_id }}
{{ $test->test_type }}
{{ $test->test_value }}

@stop