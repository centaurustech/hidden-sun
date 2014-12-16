@extends('layouts.master')
@section('content')
<h1>Log In</h1>
    {{ Form::open(['action' => 'HomeController@showLogin']) }}

    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eMail']) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

    {{ Form::submit('Log In')}}

    {{ Form::close() }}
@stop
