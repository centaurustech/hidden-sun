@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="title">
			<h2><center>{{ $project->project_title }}</center></h2>
			<h4><center>{{ $project->stage }}</center></h4>
		</div>
	</div>
</div>
<hr>
<div class="container progress">
	<div class="row">
		<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $funding_progress }}%;"></div>
 	</div>
</div>
<div class="container">
	<div class="row">
		<span style="float:left;"><b>Current funding: </b>{{ $project->funds_current }}</span>
		<span style="float:right;"><b>Goal: </b>{{ $project->funds_goal }}</span>
	</div>
</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="embed-responsive embed-responsive-4by3">
				<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
			</div>
			<h3>{{ $project->synopsis }}</h3>
		</div>
		<div class="col-md-4">
			<table class="table">
				<tr>
					<td>Production Start Date</td>
					<td>{{ $project->start_date }}</td>
				</tr>
				<tr>
					<td>Estimated Completion Date</td>
					<td>{{ $project->complete_date }}</td>
				</tr>
				<tr>
					<td>Funding Until</td>
					<td>{{ $project->funds_end_date }}</td>
				</tr>
			</table>
			<p><a href="{{ URL::route('project-contribute', $project->id) }}">Contribute to {{ $project->project_title }}</a></p>
		</div>
	</div>

</div><!--row -->


@stop
