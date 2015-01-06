@extends('layouts.master')
@section('content')
<!-- BIG HEADER WITH PICTURE -->
<div class="container-fluid">
	<div class="row">
		<div class="header">
			<div id="header-copy">
				<h1 style="font-size:4em;">Fund your independent film.</h1>
				<p> ... </p>
				<p><a class="btn btn-success btn-lg" href="#howitworks" role="button">How it Works</a></p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-1">
			<div id="featured-project">
			<h2>Featured Project</h2>
			<hr>
			@foreach ($random_project as $project)
				<h3>{{ $project->project_title }}</h3>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
							</div>
						</div>

						<div class="col-md-4">
							<h3>stuff to the right</h3>
						</div>
					</div>
				</div>
		  	@endforeach
		  </div>
	 	</div>
	</div>
</div>
@stop
