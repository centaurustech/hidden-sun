@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="title">
			<h2><center>{{ $project->project_title }}</center></h2>
			<h4><center>{{ $project->stage }}</center></h4>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:{{ $funding_progress }}%;"></div>
			</div>
			<span style="float:left;"><b>Current funding: </b>{{ $currently_funded }}</span>
			<span style="float:right;"><b>Goal: </b>{{ $project->funds_goal }}</span>
		</div>
	</div>
</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="embed-responsive embed-responsive-4by3">
				<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
			</div>
			<h3>{{ $project->synopsis }}</h3>
		</div>
		<div class="col-md-4">
			<table class="table">
				<tr>
					<td>Production Start Date</td>
					<td>{{ $project->start_date }}</td>
				</tr>
				<tr>
					<td>Estimated Completion Date</td>
					<td>{{ $project->complete_date }}</td>
				</tr>
				<tr>
					<td>Funding Until</td>
					<td>{{ $project->funds_end_date }}</td>
				</tr>
			</table>
			<hr>
			<h3>Contribute to {{ $project->project_title }}</h3>
			<form action="{{ URL::route('donation-create', $project->id) }}" method="post">
				<input type="radio" name="donation_amount" value="5">5<br>
				<input type="radio" name="donation_amount" value="25">25<br>
				<input type="radio" name="donation_amount" value="50">50<br>
				<input type="radio" name="donation_amount" value="100">100<br>
				<input type="radio" name="donation_amount" value="custom">Custom
				<input type="text" name="custom_amount"><br>
	                @if($errors->has('donation_amount'))
                    	{{ $errors->first('donation_amount') }}
                	@endif
					<button type="submit" class="btn btn-success" value="create_donation">
						Payment Page
					</button>
			</form>
		</div>
	</div>

</div><!--row -->


@stop
