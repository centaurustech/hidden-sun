@extends('layouts.master')
@section('content')
<div class="container" style="margin-bottom:100px;">
	<div class="row">
		<div class="col-md-12">
			<h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s Projects</h2>
			<hr>
			@if(count($projects))
				<h3>Active Projects</h3>
					<table class="table table-hover" id="active-projects">
						<tr>
							<th>Project Name</th>
							<th>Current Donations</th>
							<th>Goal</th>
							<th>Funding Begin Date</th>
							<th>Funding End Date</th>
							<th>Action</th>
						</tr>
					@foreach($projects as $project)
						@if($project->status == 'active')
							<tr>
								<td>{{ $project->project_title }}</td>
								<td>${{ $project->donation_total }}</td>
								<td>${{ $project->funding_goal }}</td>
								<td>{{ $project->funds_start_date }}</td>
								<td>{{ $project->funds_end_date }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Manage Project <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
										<li><a href="{{ URL::route('project-show', $project->id) }}">View Project</a></li>
										<li><a href="{{ URL::route('project-edit', $project->id) }}">Edit Project</a></li>
										<li><a href="#">View Statistics</a></li>
										<li class="divider"></li>
										<li><a href="{{ URL::route('project-end', $project->id) }}">End Project</a></li>
										</ul>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
					</table>

					<!-- PROJECTS PENDING ACTIVATION -->
					<h3>Projects Pending Activation</h3>
					<table class="table table-hover" id="pending-activation">
						<tr>
							<th>Project Name</th>
							<th>Current Donations</th>
							<th>Goal</th>
							<th>Funding Begin Date</th>
							<th>Funding End Date</th>
							<th>Action</th>
						</tr>
					@foreach($projects as $project)
						@if($project->status == 'pending activation')
							<tr>
								<td>{{ $project->project_title }}</td>
								<td>${{ $project->donation_total }}</td>
								<td>${{ $project->funding_goal }}</td>
								<td>{{ $project->funds_start_date }}</td>
								<td>{{ $project->funds_end_date }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Manage Project <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
										<li><a href="{{ URL::route('project-show', $project->id) }}">View Project</a></li>
										<li><a href="{{ URL::route('project-edit', $project->id) }}">Edit Project</a></li>
										<li><a href="#">View Statistics</a></li>
										<li class="divider"></li>
										<li><a href="{{ URL::route('project-end', $project->id) }}">End Project</a></li>
										</ul>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
					</table>

					<!-- PROJECTS THAT HAVE BEEN ENDED -->
					<h3>Ended Projects</h3>
					<table class="table table-hover" id="ended">
						<tr>
							<th>Project Name</th>
							<th>Current Donations</th>
							<th>Goal</th>
							<th>Funding Begin Date</th>
							<th>Funding End Date</th>
							<th>Action</th>
						</tr>
					@foreach($projects as $project)
						@if($project->status == 'ended')
							<tr>
								<td>{{ $project->project_title }}</td>
								<td>${{ $project->donation_total }}</td>
								<td>${{ $project->funding_goal }}</td>
								<td>{{ $project->funds_start_date }}</td>
								<td>{{ $project->funds_end_date }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Manage Project <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
										<li><a href="{{ URL::route('project-show', $project->id) }}">View Project</a></li>
										<li><a href="{{ URL::route('project-edit', $project->id) }}">Edit Project</a></li>
										<li><a href="#">View Statistics</a></li>
										<li class="divider"></li>
										<li><a href="{{ URL::route('project-end', $project->id) }}">End Project</a></li>
										</ul>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
					</table>
			@endif
		</div>
	</div>
</div>
@stop