@extends('layouts.master')
@section('content')
<!-- BIG HEADER WITH PICTURE -->
<div class="container-fluid" style="margin-bottom:80px;">
	<div class="row">
		<div class="header">
			<div class="col-md-8 col-md-offset-2">
				<div id="header-copy">
					<h1 style="font-size:4em;">Fund your independent film.</h1>
					<p></p>
					<p><a class="btn btn-success btn-lg" href="{{ URL::route('howto') }}" role="button">How it Works</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="featured-project" style="padding-bottom:20px;">
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

				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:{{ $project->funding_progress }}%;"></div>
				</div>
				<span style="float:left;"><b>Donation Total: </b>${{ $project->donation_total }}</span>
				<span style="float:right;"><b>Goal: </b>${{ $project->funding_goal }}</span>
			</div>
			<div class="col-md-4">
				<div id="featured-project-info" style="padding-top:50px;">
					<p style="font-size:16px;">{{ $project->synopsis }}</p>
					<a href="{{ URL::route('project-show', $project->id) }}">
						<button type="button" class="btn btn-info">
							View Project
						</button>
					</a>
				</div>
			</div>
		</div>	
		@endforeach
	</div>
</div>
@stop
