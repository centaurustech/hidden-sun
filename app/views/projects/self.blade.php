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
	<table class="table table-bordered" id="projects-table">
		@foreach ($projects as $project)
			<tr>
				<td>
					<iframe width="100" height="56" src="{{ $project->video_url }}" frameborder="0" allowfullscreen></iframe>
				</td>
				<td>
					<table>
						<tr><td><b>Title: </b>{{ $project->project_title }}</td></tr>
						<tr><td><b>Genre: </b>
							{{{ $project->genre_list }}}
						</td></tr>
						<tr><td><b>Goal: </b>{{ $project->funds_goal }}</td></tr>
						<tr><td><b>Currently Funded: </b>{{ $project->funds_current }}</td></tr>
						<tr><td><b>Funding Ends: </b>{{ $project->funds_end_date }}</td></tr>
						<tr><td><a href="{{ $project->id }}">See Project</a></td></tr>
						<tr><td><a href="{{ $project->id }}">Edit Project</a></td></tr>
					</table>
				</td>
			</tr>
		@endforeach
	</table>
</div>
@stop