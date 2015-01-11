@extends('layouts.master')
@section('content')
<div class="form-outline">
    <h1>Contribute to {{ $project->project_title }}</h1>

    <form action="{{ url('pay') }}" method="POST">
      <script
        src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
        data-key="{{ Config::get('stripe.stripe.public') }}"
        data-amount="{{ Input::get('donation_amount') }}"
        data-name="Film Seedr"
        data-description="Your donation to {{ $project->project_title }}"
        data-image="/128x128.png">
      </script>
    </form>
</div> <!--form outline -->
@stop