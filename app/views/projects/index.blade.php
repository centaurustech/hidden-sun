@extends('layouts.master')
@section('content')
<table class="table table-bordered" id="projects-table">
	<tr>
		<th>Video</th>
		<th>Title</th>
		<th>Genre</th>
		<th>Funding End Date</th>
	</tr>
	@foreach ($projects as $project)
		<tr>
			<td>{{ $project->video_url }}</td>
			<td>{{ $project->project_title }}</td>
			<td>Genre</td>
			<td>{{ $project->funds_end_date }}</td>
		</tr>
	@endforeach

	{{ $projects->links() }}
</table>
@stop