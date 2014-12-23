@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<h1>Manage Account</h1>
		<hr>
		<h3>Personal Information</h3>
		<p>[<a href="{{ URL::route('account-edit-personal') }}">edit</a>]</p>
		<table class="table">
			<tr>
				<td>Name</td>
				<td>{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>{{ Auth::user()->phone_number }}</td>
			</tr>
			<tr>
				<td>City</td> 
				<td>{{ Auth::user()->city }}</td>
			</tr>
			<tr>
				<td>State</td>
				<td>{{ Auth::user()->state }}</td>
			</tr>
		</table>
		<hr>
		<h3>Account Status</h3>
		<table class="table">
			<tr>
				<td>Account Status</td>
				<td>
					@if (Auth::user()->active == '1')
						<span style="color:green;font-weight:bold;">Active</span>
					@else
						<span style="color:red;font-weight:bold;">Inactive</span>
					@endif
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><a href="{{ URL::route('account-change-password') }}">Change Password</a></td>
			</tr>
		</table>
	</div>
</div>	

@stop