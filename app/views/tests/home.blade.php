@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

<h2>Tests</h2>

<table class="table table-striped">
@foreach ($tests as $test)
	<tr>
		<td>{{ (time() < strtotime($test->expire)) ? '<i class="icon-spin icon-spinner"></i> Running' : '<i class="icon-ok"></i> Completed' }}</td>
		<td>{{{ $test->name }}}</td>
		<td><a href="/apps/1">What's Open Nearby?</a></td>
		<td>{{ (time() < strtotime($test->expire)) ? 'Expires ' . $test->getExpiresRelative() : '&mdash;' }}</td>
		<td><a href="{{ URL::route('tests.show', array($test->id)) }}" class="btn btn-success">Show test</a></td>
		<td><a href="{{ URL::to('tests/' . $test->id . '/stop') }}" class="btn btn-danger"{{ (time() >= strtotime($test->expire) ? ' disabled="disabled" onclick="return false;"' : '') }}><i class="icon-remove"></i> Stop test</a></td>
	</tr>
@endforeach
</table>

@stop