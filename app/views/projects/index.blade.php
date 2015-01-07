@extends('layouts.master')
@section('content')
<<<<<<< HEAD
<div class="col-md-2">
<form id="browse-search-box" class="" method="get">
        <div id="browse-search">
                <div class="browse-search-container">
                	<input class="browse-search" id="searchInput" type="text" placeholder="Search for...">
                		<button type="button">Go</button>
    			</div>
        </div>
</form>

	<table>
=======
<div class="container-fluid" style="margin-top:25px;margin-bottom:100px;">
	<div class="row">
		<div class="col-md-3">
			<form action="{{ URL::route('projects-discover') }}" method="get" name="search-form" id="search-form">
				<div class="input-group input-group-lg centered">
					<input type="text" class="form-control" placeholder="Search" id="search" name="search">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit" style="">Go!</button>
				</div>
			</form>
			<hr>
			<div style="margin:auto;padding-left:29px;">
				<table>
					<tr>
						<th>Browse by Genre</th>
					</tr>
					@foreach ($genres as $genre)
					<tr><td>
						<a href="?genre={{ $genre->id }}">
							{{ $genre->genre }}
						</a>
					</td></tr>
					@endforeach
				</table>
			</div>
		</div>
		<div class="col-md-8" style="padding: 10px;">
			@foreach ($projects as $project)
			<ul class="thumbnails list-unstyled">
		        <li class="col-md-4" style="height: 550px; padding: 5px; margin-top:10px;margin-bottom:20px;">
		          <div class="thumbnail" style="padding: 0">
		            <div style="padding:4px">
		              <img alt="300x200" style="width: 100%" src="{{ $project->thumbnail_url }}">
		            </div>
		            <div class="caption">
		              <h2>{{ $project->project_title }}</h2>
		              <p>{{ $project->synopsis }}</p>
		              <p><i class="icon icon-map-marker"></i>{{ $project->genre_list }}</p>
		            </div>
		            <div class="modal-footer" style="text-align: left">
		              <div class="progress">
		                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->funding_progress }}%;">
		                    <span class="sr-only"></span>
		                </div>
		              </div>
		              <div class="row">
		                <div class="col-md-4"><b>{{ $project->funding_progress }}%</b><br/><small>FUNDED</small></div>
		                <div class="col-md-4"><b>{{ $project->funds_current }}</b><br/><small>PLEDGED</small></div>
		                <div class="col-md-4"><b>18</b><br/><small>DAYS</small></div>
		              </div>
		            </div>
		          </div>
		        </li>
		    </ul>
		    @endforeach
			@if (!Input::has('genre'))
				{{ $projects->links() }}
			@endif
		</div>
	</div>
</div>
@stop
<!--
<table class="table table-bordered" id="projects-table">
	@foreach ($projects as $project)
>>>>>>> master
		<tr>
			<td>
				<img src="{{ $project->thumbnail_url }}">
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
				</table>
			</td>
		</tr>
<<<<<<< HEAD
		@foreach ($genres as $genre)
		<tr><td>
			<a href="?genre={{ $genre->id }}">
				{{ $genre->genre }}
			</a>
		</td></tr>
		@endforeach
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
					</table>
				</td>
			</tr>
		@endforeach
	</table>
	@if (!Input::has('genre'))
		{{ $projects->links() }}
	@endif
</div>
@stop
=======
	@endforeach
</table>
-->
>>>>>>> master
