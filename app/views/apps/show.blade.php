@extends('layouts.master')

@section('title')
	FlipTest
@stop

@section('content')

@foreach ($viewControllers as $viewController)

<?php if ($viewController->name == 'RevealController') continue; ?>

<div class="viewcontroller-container">
	<h2>{{ $viewController->name }}</h2>

	<div class="viewcontroller @if ($viewController->parentController == 'UINavigationController') with-navigationbar@endif">
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
	<div class="view viewtype-{{ $view->className }}@if ($view->className == 'UIButton') btn@endif" style="left: {{ $view->x }}px; top: {{ $view->y }}px; width: {{ $view->w }}px; height: {{ $view->h }}px;">
		<h3>
			@if (($view->className == 'UIButton' || $view->className == 'UILabel') && isset($view->text))
				{{ $view->text }}
			@endif
		</h3>

		@if ($view->className != 'UIButton' && $view->className != 'UITableView')
			@foreach ($view->children as $subview)
			{{ printView($subview); }}
			@endforeach
		@endif
	</div>
	<?php
}
?>

@stop