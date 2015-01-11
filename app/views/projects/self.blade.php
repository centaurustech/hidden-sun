@extends('layouts.master')
@section('content')
<div class="col-md-2">
	<table>
		<tr><th>Sort</th></tr>
		<tr><td><a href="?sort=new">New Projects</td></tr>
		<tr><td><a href="?sort=funded">Fully Funded</td></tr>
		<tr><td><a href="?sort=ending">Ending Soon</td></tr>
	</table>
</div>
<div class="col-md-8">
	@if(count($projects))
	<h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s Projects</h2>
	<hr>
		@foreach($projects as $project)
			@if($project->status == 'active')
				<h3>Active Projects</h3>
				<table class="table table-hover" id="active-projects">
					<tr>
						<th>Project Name</th>
						<th>Current Donations</th>
						<th>Goal</th>
						<th>Funding Begin Date</th>
						<th>Funding End Date</th>
					</tr>
					<tr>
						<td>{{ $project->project_title }}</td>
						<td>${{ $project->donation_total }}</td>
						<td>${{ $project->funds_goal }}</td>
						<td>{{ $project->funds_start_date }}</td>
						<td>{{ $project->funds_end_date }}</td>
					</tr>
				</table>
			@endif
			@if($project->status == 'pending activation')
				<h3>Projects Pending Activation</h3>
				<table class="table table-hover" id="pending-activation">
					<tr>
						<th>Project Name</th>
						<th>Current Donations</th>
						<th>Goal</th>
						<th>Funding Begin Date</th>
						<th>Funding End Date</th>
					</tr>
					<tr>
						<td>{{ $project->project_title }}</td>
						<td>${{ $project->donation_total }}</td>
						<td>{{ $project->funds_goal }}</td>
						<td>{{ $project->funds_start_date }}</td>
						<td>{{ $project->funds_end_date }}</td>
					</tr>
				</table>
			@endif
		@endforeach
		@if($project->status == 'ended')
				<h3>Ended Projects</h3>
				<table class="table table-hover" id="ended">
					<tr>
						<th>Project Name</th>
						<th>Current Donations</th>
						<th>Goal</th>
						<th>Funding Begin Date</th>
						<th>Funding End Date</th>
					</tr>
					<tr>
						<td>{{ $project->project_title }}</td>
						<td>${{ $project->donation_total }}</td>
						<td>{{ $project->funds_goal }}</td>
						<td>{{ $project->funds_start_date }}</td>
						<td>{{ $project->funds_end_date }}</td>
					</tr>
				</table>
			@endif
	@endif
</div>
@stop