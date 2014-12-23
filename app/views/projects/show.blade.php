@extends('layouts.master')
@section('content')

	<div class="title">
		<h2><center>{{ $project->project_title }}</center></h2>
		<h4><center>{{ $project->stage }}</center></h4>
	</div>

	<div class="progress">
	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $funding_progress }}%;">
    	<span class="sr-only">60% Complete</span>
 	</div>
 	</div>
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-8">
			<div class="embed-responsive embed-responsive-4by3">
			<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
			</div>
				<div>
					<h3>{{ $project->synopsis }}</h3>
				</div>
		</div>
		<div class="col-md-4">
			<h4>{{ $project->start_date }}</h4>
			<h4>{{ $project->complete_date }}</h4>
			<h4>{{ $project->funds_end_date }}</h4>
			<h4>{{ $project->funds_goal }}</h4>
			<h4>{{ $project->funds_current }}</h4>
		
		</div>
		</div>
	
	</div><!--row -->
</div><!-- container -->

@stop