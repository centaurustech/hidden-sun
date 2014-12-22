@extends('partials.nav')
@section('genres-nav')
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="position:relative;top:100px;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#genres-nav">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<h3>Genres</h3>
	</div>
	<div class="collapse navbar-collapse" id="genres-nav" style="">
		<div class="nav navbar-nav">
			<ul class="nav navbar-nav">
				<li>Genre Here</li>
				<li>Genre There</li>
				<li>Genres Everywhere</li>
				<li><a href="#">See More</a></li>
			</ul>
		</div>
	</div>
</nav>
@stop