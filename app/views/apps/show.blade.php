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
			<h4>What would you like to test?</h4>

			<label class="radio">
				<input type="radio" name="test_type" id="test_type_text" value="text" checked>
				Test copy
			</label>
			<label class="radio">
				<input type="radio" name="test_type" id="test_type_textcolor" value="textcolor">
				Test text color
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

			<h4>Test settings</h4>
			<div class="control-group">
				<label class="control-label" for="test_name">Test Name</label>
				<div class="controls">
					<input type="text" name="test_name" id="test_name" placeholder="Test Name">
					<span class="help-block">Please enter a unique name for this test.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="duration_length">Duration</label>
				<div class="controls">
					<input type="text" name="duration_length" id="duration_length" class="span1" value="1">
					<select name="duration_unit" class="span2">
						<option value="H">hour(s)</option>
						<option value="D">day(s)</option>
						<option value="W">week(s)</option>
						<option value="M">month(s)</option>
					</select>
					<span class="help-block">How long should the test run for?</span>
				</div>
			</div>

			<input type="hidden" name="controller_id" id="controller_id" value="" />
			<input type="hidden" name="view_id" id="view_id" value="" />
			<input type="hidden" name="app_id" id="app_id" value="{{{ Request::segment(2) }}}" />
			<input type="hidden" name="original_text" id="original_text" value="" />
			<input type="hidden" name="original_textcolor" id="original_textcolor" value="" />
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="modal-cancel">Cancel</a>
		<input type="submit" value="Create" class="btn btn-primary" />
	</div>
	{{ Form::close() }}
</div>

<p class="lead">Here is a list of the view controllers/screens we have detected in your app.</p>
<p class="lead">Select a controller and then click on a button or label to start a new A/B test!</p>

<?php $first = true; ?>
<ul class="controllers-list">
@foreach ($viewControllers as $viewController)
	<?php if ($viewController->name == 'RevealController') continue; ?>
	<li><a href="#{{ $viewController->name }}" class="{{ $first ? 'active' : '' }}">{{ $viewController->name }}</a></li>
	<?php $first = false; ?>
@endforeach
</ul>

<?php $first = true; ?>
@foreach ($viewControllers as $viewController)
	<?php if ($viewController->name == 'RevealController') continue; ?>

	<div class="viewcontroller-container viewcontroller-container-{{{ $viewController->name }}} {{ $first ? '' : 'hide' }}">
		<?php $first = false; ?>
		<h2>{{ $viewController->name }}</h2>

		<div class="viewcontroller @if ($viewController->view_data->parentController == 'UINavigationController') with-navigationbar@endif" data-controllerid="{{ $viewController->id }}">
			{{ printView($viewController->view_data->views) }}
		</div>
	</div>
@endforeach

<div class="clearfix"></div>

<?php
function printView($view) {

	if ($view->className[0] == '_')
		return;
	?>
	@if ($view->className == 'UIButton' || $view->className == 'UIRoundedRectButton')
		<a class="view viewtype-{{ $view->className }} btn btn-warning {{ empty($view->text) ? '' : 'is-text' }}" style="left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px; font-size: {{ empty($view->text) ? round($view->w * 4) : 100 }}%;" data-viewid="{{ $view->id }}" data-orig-text="{{ isset($view->text) ? $view->text : '' }}" data-orig-textcolor="{{ isset($view->textcolor) ? $view->textcolor : '' }}"><span>{{ empty($view->text) ? '<i class="icon-picture"></i>' : $view->text }}</span></a>
	@elseif ($view->className == 'UITextField')
		<input type="text" style="display: block; position: absolute; left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px;" />
	@else
		<div class="view viewtype-{{ $view->className }}" style="left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px;" data-viewid="{{ $view->id }}" data-orig-text="{{ isset($view->text) ? $view->text : '' }}" data-orig-textcolor="{{ isset($view->textcolor) ? $view->textcolor : '' }}">
				@if (($view->className == 'UILabel') && isset($view->text))
					<span>{{ $view->text }}</span>
				@endif

			@foreach ($view->children as $subview)
			{{ printView($subview); }}
			@endforeach
		</div>
	@endif
	<?php
}
?>

@stop