@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('scripts')
	@parent
	{{ HTML::script('js/app.js') }}
@stop

@section('content')

<div id="create-test" class="modal hide fade">
	{{ Form::open(array('route' => 'tests.store', 'class' => 'form-horizontal')) }}
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Create a New Test</h3>
	</div>
	<div class="modal-body">
			<h4>What should be changed?</h4>

			<label class="radio">
				<input type="radio" name="test_type" id="test_type_text" value="text" checked>
				Change text
			</label>
			<label class="radio">
				<input type="radio" name="test_type" id="test_type_textcolor" value="textcolor">
				Change text color
			</label>

			<div id="section_test_type_text">
				<div class="control-group">
					<label class="control-label" for="view_text">Text</label>
					<div class="controls">
						<input type="text" name="view_text" id="view_text" value="">
					</div>
				</div>
			</div>

			<div id="section_test_type_textcolor" class="hide">
				<div class="control-group">
					<label class="control-label" for="view_textcolor">Text Color</label>
					<div class="controls">
						<input type="color" name="view_textcolor" id="view_textcolor" value="">
					</div>
				</div>
			</div>

			<h4>Test information</h4>
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

			<input type="hidden" name="controller_id" id="controller_id" value="" />
			<input type="hidden" name="view_id" id="view_id" value="" />
			<input type="hidden" name="app_id" id="app_id" value="{{{ Request::segment(2) }}}" />
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="modal-cancel">Cancel</a>
		<input type="submit" value="Create" class="btn btn-primary" />
	</div>
	{{ Form::close() }}
</div>

<p class="lead">Here is a list of all the detected controllers in your app, you can click on a button or label to start a new test.</p>

@foreach ($viewControllers as $viewController)
	<?php if ($viewController->name == 'RevealController') continue; ?>

	<div class="viewcontroller-container">
		<h2>{{ $viewController->name }}</h2>

		<div class="viewcontroller @if ($viewController->parentController == 'UINavigationController') with-navigationbar@endif" data-controllerid="{{ $viewController->id }}">
			{{ printView($viewController->view_data) }}
		</div>
	</div>
@endforeach

<div class="clearfix"></div>

<?php
function printView($view) {

	if ($view->className[0] == '_')
		return;
	?>
	@if ($view->className == 'UIButton')
		<a class="view viewtype-{{ $view->className }} btn btn-warning" style="left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px;" data-viewid="{{ $view->id }}"><span>{{ $view->text }}</span></a>
	@else
		<div class="view viewtype-{{ $view->className }}" style="left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px;" data-viewid="{{ $view->id }}">
				@if (($view->className == 'UILabel') && isset($view->text))
					{{ $view->text }}
				@endif

			@if ($view->className != 'UITableView')
				@foreach ($view->children as $subview)
				{{ printView($subview); }}
				@endforeach
			@endif
		</div>
	@endif
	<?php
}
?>

@stop