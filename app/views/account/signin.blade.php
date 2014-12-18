@extends('layouts.master')
@section('content')
<h1>Log In</h1>

<form class="form-horizontal" role="form" action="{{ URL::route('account-sign-in-post') }}" method="post">
    <div class="form-group">    
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            {{ Form::text('email', Input::old('email'), ['placeholder' => 'johnsmith@example.com']) }} 
            @if($errors->has('email'))
            	{{ $errors->first('email') }}
            @endif
        </div>
    </div>    
    <div class="form-group">    
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            {{ Form::password('password') }} 
            @if($errors->has('password'))
            	{{ $errors->first('password') }}
            @endif
        </div>
    </div>
    <div class="form-group">
    	<label for="remember" class="col-sm-2 control-label">Remember Me: </label>
    	<input type ="checkbox" name="remember" id="remember">
    </div>
    {{ Form::submit('Sign In')}}
    {{ Form::token() }}
</form>
@stop
