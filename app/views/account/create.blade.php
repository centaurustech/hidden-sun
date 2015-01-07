@extends('layouts.master')
@section('content')
<div class="container">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="{{ URL::route('account-sign-in') }}">Sign In</a></div>
            </div>  
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" action="{{ URL::route('account-create-post') }}" method="post" role="form">
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>...</p>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            {{ Form::text('email', Input::old('email'), ['placeholder' => 'Email Address', 'class' => 'form-control']) }} 
                                @if($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                        </div>
                    </div>          
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            {{ Form::text('first_name', Input::old('first_name'), ['placeholder' => 'First Name', 'class' => 'form-control']) }} 
                                @if($errors->has('first_name'))
                                    {{ $errors->first('first_name') }}
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            {{ Form::text('last_name', Input::old('last_name'), ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                                @if($errors->has('last_name'))
                                    {{ $errors->first('last_name') }}
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }} 
                                @if($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Sign Up</button>
                            <span style="margin-left:8px;">or</span>  
                        </div>
                    </div>
                    <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="button" class="btn btn-primary" value="Create Account"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                        </div>                                            
                    </div>
                    {{ Form::token() }}
                </form>
                </div>
            </div>
        </div> 
    </div>
</div> <!-- container -->
@stop