@extends('layouts.master')
@section('content')
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
		<div class="col-md-8">
			<div id="projects-thumbnails" style="margin-top:-25px;margin-bottom:10px;">
				@foreach ($projects as $project)
					@if($project->status == 'active' OR $project->status == 'flagged')
					<ul class="thumbnails list-unstyled">
				        <li class="col-md-4" style="height: 550px; padding: 5px; margin-top:10px;margin-bottom:20px;">
				          <div class="thumbnail" style="padding: 0;">
				            <div style="padding:4px">
				              <img alt="300x200" style="width: 100%" src="{{ $project->thumbnail_url }}">
				            </div>
				            <div class="caption">
				              <h2>{{ $project->project_title }}</h2>
				              <p>{{ $project->synopsis }}</p>
				              <p><i class="icon icon-map-marker"></i>{{ $project->genre_list }}</p>
				              <a href="{{ $project->id }}">
				              	<button type="button" class="btn btn-info">
				              		View Project
				              	</button>
				              </a>
				            </div>
				            <div class="modal-footer" style="text-align: left">
				              <div class="progress">
				                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->funding_progress }}%;">
				                    <span class="sr-only"></span>
				                </div>
				              </div>
				              <div class="row">
				                <div class="col-md-4"><b>{{ $project->funding_progress }}%</b><br/><small>FUNDED</small></div>
				                <div class="col-md-4"><b>${{ $project->currently_funded_with_donations }}</b><br/><small>PLEDGED</small></div>
				                <div class="col-md-4"><b>{{ $project->days_left }}</b><br/><small>DAYS</small></div>
				              </div>
				            </div>
				          </div>
				        </li>
				    </ul>
				    @endif
			    @endforeach
			</div>

		</div>
	</div>
	@if (!Input::has('genre'))
	<div class="row" style="margin-top:50px;">
		<div class="col-md-6 col-md-offset-6" id="pagination" style="">
			<span style="margin:auto;">{{ $projects->links() }}</span>
		</div>
	</div>
	@endif
	</div>
</div>
@stop
