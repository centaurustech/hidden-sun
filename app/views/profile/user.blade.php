@extends('layouts.master')
@section('content')
	<h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
	<p> Welcome to your profile, {{ $user->first_name }}!</p>
@stop