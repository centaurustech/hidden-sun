@extends('layouts.master')
@section('content')
<div class="form-outline">
    <h2>You are about to make a donation to {{ $project->project_title }}...</h2>

    <form action="{{ url('donate') }}" method="POST">
    	<input type="hidden" name="amount" value="{{ $donation_amount }}">
		<script
		src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
		data-key="{{ Config::get('stripe.stripe.public') }}"
		data-amount="{{ $donation_amount }}"
		data-name="Film Seedr"
		data-description="Your donation to {{ $project->project_title }}"
		data-image="/128x128.png">
		</script>
    </form>

    <form action="{{ url('dummy-donate') }}" method="POST">
    	<input type="hidden" name="amount" value="{{ $donation_amount }}">
    	<input type="hidden" name="project_id" value="{{ $project->id }}">
    	<button type="submit">Dummy Donate {{ $donation_amount }} to project id {{ $project->id }}</button>
    </form>
</div> <!--form outline -->
@stop