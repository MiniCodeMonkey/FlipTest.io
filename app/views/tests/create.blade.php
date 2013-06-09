@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')
	<h3>Test information</h3>

	{{ Form::open(array('route' => 'tests.store', 'class' => 'form-horizontal')) }}
	<div class="control-group">
		<label class="control-label" for="test_name">Test Name</label>
		<div class="controls">
			<input type="text" name="test_name" id="test_name" placeholder="Test Name">
			<span class="help-block">Please enter a name for this test, this will make it easier to identify it later.</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="duration_length">Duration</label>
		<div class="controls">
			<input type="text" name="duration_length" id="duration_length" class="span1" value="1">
			<select name="duration_unit" class="span2">
				<option>day(s)</option>
				<option>week(s)</option>
				<option>month(s)</option>
			</select>
			<span class="help-block">For how long do you want the test to run?</span>
		</div>
	</div>
	{{ Form::close() }}
@stop