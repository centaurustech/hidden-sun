@extends('layouts.master')
@section('content')

@if(Session::has('thank_you_message'))
	<div class="jumbotron">
	      <div class="container">
	      	<h2>Thank You!</h2>
	        <p style="font-size:16px;">Your donation is complete!</p>
	      </div>
	</div>
@endif
<div class="container" style="margin-bottom:20px;">
	<div class="row">
		<div class="title">
			<h2><center>{{ $project->project_title }}</center></h2>
			<h3><center>Creator: <a href="{{ URL::route('profile-user', $creator->id) }}">{{ $creator->first_name }} {{ $creator->last_name }}</a></center></h3>
			<h4><center>{{ $project->stage }}</center></h4>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="progress">
				@if ($project->funding_progress <= 100)
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:{{ $project->funding_progress }}%;"></div>
				@else
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
				@endif
			</div>
			<span @if($project->funding_progress < 100) style="float:left;" @else style="float:left;color:green;" @endif><b>Donation Total: </b>${{ $project->donation_total }} @if($project->funding_progress > 100)This project has exceeded it's goal! Great job!@endif</span>
			<span style="float:right;"><b>Goal: </b>${{ $project->funding_goal }}</span>
		</div>
	</div>
</div>
<hr>
<div class="container" style="margin-bottom:100px;">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="embed-responsive embed-responsive-4by3">
					@if($project->video_url == false)
						<img src="{{$project->thumbnail_url}}" height="400"/>
					@else
						<iframe class="embed-responsive-item" src="{{ $project->video_url }}"></iframe>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<table class="table table-hover">
					<tr>
						<td>Funding Begins: </td>
						<td>{{ $project->funding_start_date }}</td>
					</tr>
					<tr>
						<td>Funding Ends: </td>
						<td>{{ $project->funds_end_date }}</td>
					</tr>
				</table>
			<hr>
				<h3>Contribute to {{ $project->project_title }}</h3>
				<div id="contribute-form" style="padding-left:20px;padding-right:20px;">	
					<form action="{{ URL::route('donation-create', $project->id) }}" method="post">
						<div class="radio">
							<input type="radio" name="donation_amount" value="5">$5
						</div>
						<div class="radio">
							<input type="radio" name="donation_amount" value="25">$25
						</div>
						<div class="radio">
							<input type="radio" name="donation_amount" value="50">$50
						</div>
						<div class="radio">
							<input type="radio" name="donation_amount" value="100">$100
						</div>
						<div class="radio">
							<input type="radio" name="donation_amount" value="custom">Custom
							<input type="text" name="custom_amount">
				                @if($errors->has('donation_amount'))
			                    	{{ $errors->first('donation_amount') }}
			                	@endif
			            </div>
			            	<div id="payment-page-btn" style="height:40px;width:150px;margin:auto;margin-top:20px;">
								<button type="submit" class="btn btn-success" value="create_donation">
									Payment Page
								</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<h3>Synopsis</h3>
			<p style="font-size:16px;">{{ $project->synopsis }}</p>
		</div>
	</div>
</div>
</div>
@stop
