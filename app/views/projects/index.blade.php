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
			<td>
				<iframe width="100" height="56" src="{{ $project->video_url }}" frameborder="0" allowfullscreen></iframe>
			</td>
			<td>{{ $project->project_title }}</td>
			<td>
			@foreach ($project->genres as $genre)
				{{ $genre->genre }} 
			@endforeach
			</td>
			<td>{{ $project->funds_end_date }}</td>
		</tr>
	@endforeach
{{ $projects->links() }}
</table>
@stop