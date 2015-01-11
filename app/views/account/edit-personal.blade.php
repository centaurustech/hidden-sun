@extends('layouts.master')
@section('content')
<h1>Edit Personal Information</h1>
<hr>
{{ Form::model($current_user, array('route' => array('account-edit-personal-put', $current_user->id), 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('first_name', 'First Name', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('first_name') }}
			@if($errors->has('first_name'))
				{{ $errors->first('first_name') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('last_name') }}
			@if($errors->has('last_name'))
				{{ $errors->first('last_name') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email (required)', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('email') }}
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('phone_number', 'Phone Number', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('phone_number') }}
			@if($errors->has('phone_number'))
				{{ $errors->first('phone_number') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('city', 'City', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('city') }}
			@if($errors->has('city'))
				{{ $errors->first('city') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('state', 'State', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('state') }}
			@if($errors->has('state'))
				{{ $errors->first('state') }}
			@endif
		</div>
	</div>

	{{ Form::token() }}

	{{ Form::submit('Update') }}

{{ Form::close() }}
@stop