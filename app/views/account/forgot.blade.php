@extends('layouts.master')
@section('content')
	<form action="{{ URL::route('account-forgot-password-post }}" method="post">
		Email: <input type="text" name="email">
		@if($errors->has('email'))
			{{ $errors->first('email') }}
		@endif
		<input type="submit" value="Recover">
		{{ Form::token() }}
	</form>
@stop