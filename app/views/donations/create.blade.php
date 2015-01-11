@extends('layouts.master')
@section('content')
    @if(Session::has('stripe_errors'))
        <div class="alert alert-dismissible alert-{{ $alert-type }}" role="alert">
            <p>{{ Session::get('stripe_errors') }}</p>
        </div>
    @endif

<div class="container" style="margin-top:50px;margin-bottom:100px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Complete Your Donation</div>
                <div class="panel-body">
                    <div id="donation-panel-body" style="font-size:16px;margin-bottom:5px;margin-top:20px;padding:20px;">
                        <p>You are about to make a donation of <b>${{ $donation_amount_dollars }}</b> to <b>{{ $project->project_title }}</b></p>
                        <p>Click the button below to enter your credit card information. Your donation is handled through <a href="https://stripe.com/">Stripe</a> so your information is never stored on our servers.</p>
                    </div>
                    <div id="stripe-button-div" style="padding:10px;margin:auto;margin-bottom:20px;width:150px;height:40px;">
                        <form action="{{ url('donate') }}" method="POST">
                        	<input type="hidden" name="amount" value="{{ $donation_amount }}">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                    		<script
                    		src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
                    		data-key="{{ Config::get('stripe.stripe.public') }}"
                    		data-amount="{{ $donation_amount }}"
                    		data-name="Film Seedr"
                    		data-description="Your donation to {{ $project->project_title }}"
                    		data-image="">
                    		</script>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
</div>
@stop