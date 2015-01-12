@extends('layouts.master')
@section('content')

<link rel="stylesheet" type="text/css" href="/css/userprofile.css">

<div class="container" style="margin-bottom:80px;">
<div class="row">
	<div class="[ col-sm-6 col-md-4 ]">
		<div class="[ info-card ]">
			<img style="width: 100%" src="{{ $profile['profile_img'] }}" />
			<div class="[ info-card-details ] animate">
				<div class="[ info-card-header ]">
					<h1> {{ $user->first_name }} </h1>
					<h3> {{ $user->last_name }} </h3>
				</div>
				<div class="[ info-card-detail ]">
					<!-- Description -->
					<p> {{ $profile['summary'] }} </p>

					<div class="social">
						<a href="{{ $profile['facebook_url'] }}" class="[ social-icon facebook ] animate"><span class="fa fa-facebook"></span></a>
						<a href="{{ $profile['twitter_url'] }}" class="[ social-icon twitter ] animate"><span class="fa fa-twitter"></span></a>
						<a href="{{ $profile['linkedin_url'] }}" class="[ social-icon linkedin ] animate"><span class="fa fa-linkedin"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<h2>{{ $user->first_name }} {{ $user->last_name }}'s Projects</h2>
		<hr>
		@if(count($projects))
			<table class="table table-hover">
				<tr>
					<th></th>
					<th>Project Title</th>
					<th>Funding Progress</th>
				@foreach($projects as $project)
					<tr>
						<td><img src="{{ $project->thumbnail_url }}" width="100px" /></td>
						<td><a href="{{ URL::route('project-show', $project->id) }}">{{ $project->project_title }}</a></td>
						<td>{{ $project->funding_progress }}%</td>
					</tr>
				@endforeach
			</table>
		@else
			<h3 style="position:relative;top:50px;left:50px;">No projects to show :(</h3>
		@endif
	</div>
</div>
</div>
@stop