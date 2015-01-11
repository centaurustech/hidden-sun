@extends('layouts.master')
@section('content')

<link rel="stylesheet" type="text/css" href="/css/userprofile.css">

	    <div class="container">
		<div class="row">
			<div class="[ col-sm-6 col-md-offset-2 col-md-4 ]">
				<div class="[ info-card ]">
					<img style="width: 100%" src="/img/headshot.jpg" />
					<div class="[ info-card-details ] animate">
						<div class="[ info-card-header ]">
							<h1> {{ $user->first_name }} </h1>
							<h3> {{ $user->last_name }} </h3>
						</div>
						<div class="[ info-card-detail ]">
							<!-- Description -->
							<p> {{ $user->summary }} </p>

							<div class="social">
								<a href="https://www.facebook.com/" class="[ social-icon facebook ] animate"><span class="fa fa-facebook"></span></a>

								<a href="https://twitter.com/?lang=en" class="[ social-icon twitter ] animate"><span class="fa fa-twitter"></span></a>
							
								<a href="https://www.linkedin.com/hp/?dnr=qomIWZz9yQ0eyrsvdo2tFZYtyZyGyYYg0Au3" class="[ social-icon linkedin ] animate"><span class="fa fa-linkedin"></span></a>

								<a href="https://github.com/" class="[ social-icon github ] animate"><span class="fa fa-github-alt"></span></a>

								<a href="https://plus.google.com/" class="[ social-icon google-plus ] animate"><span class="fa fa-google-plus"></span></a>

							</div>
						</div>
					</div>
				</div>
			</div>
    		
    		<table>
    			@foreach($projects as $project)
    				<tr><td>{{ $project->project_title }}</td></tr>
    				<tr><td>{{ $project->thumbnail_url }}</td></tr>
    				<tr><td>{{ $project->synopsis }}</td></tr>
    			@endforeach
    		</table>

@stop