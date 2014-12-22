@extends('layouts.master')
@section('content')

<h1>Sign Up</h1>

<form class="form-horizontal" role="form" action="{{ URL::route('account-create-post') }}" method="post">
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
        <label for="password" class="col-sm-2 control-label">Confrim Password</label>
        <div class="col-sm-10">
            {{ Form::password('password_again') }}
            @if($errors->has('password_again'))
                {{ $errors->first('password_again') }}
            @endif 
        </div>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            {{ Form::text('first_name', Input::old('first_name'), ['placeholder' => 'John']) }} 
        </div>
    </div>
    <div class="form-group">
        <label for="last_name" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            {{ Form::text('last_name', Input::old('last_name'), ['placeholder' => 'Smith']) }} 
        </div>
    </div>    
    <div class="form-group"> 
        <label for="city" class="col-sm-2 control-label">City</label>
        <div class="col-sm-10">
            {{ Form::text('city', Input::old('city'), ['placeholder' => 'City']) }} 
        </div>
    </div>   
    <div class="form-group">    
        <label for="state" class="col-sm-2 control-label">State</label>
        <div class="col-sm-10">
            {{ Form::text('state', Input::old('state'), ['placeholder' => 'State']) }} 
        </div>
    </div>    
    {{ Form::token() }}
<button type="submit" value="Create account">Submit</button>
</form>
@stop
