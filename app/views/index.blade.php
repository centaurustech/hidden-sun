@extends('layouts.master')
@section('content')
<!-- BIG HEADER WITH PICTURE -->
<div class="container-fluid">
	<div class="row">
		<div class="header">
			<div id="header-copy">
				<h1 style="font-size:4em;">Fund your independent film.</h1>
				<p></p>
				<p><a class="btn btn-success btn-lg" href="{{ URL::route('howto') }}" role="button">How it Works</a></p>
			</div>
		</div>
	</div>
	<div class="row" id="featured-project">
		<div class="row">
			<h2><small>Featured Project</small></h2>
			<hr>
		</div>
		@foreach ($random_project as $project)
		<div class="row">
			<div class="col-md-8">
				<h3>{{ $project->project_title }}</h3>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
				</div>
			</div>
			<div class="col-md-4">
				<h4>have information about the project.</h4>
			</div>
		</div>	
		@endforeach
	</div>
</div>
@stop
