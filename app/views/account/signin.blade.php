@extends('layouts.master')
@section('content')
<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>     
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" action="{{ URL::route('account-sign-in-post') }}" method="post">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                      
                        {{ Form::text('email', Input::old('email'), ['placeholder' => 'email', 'class' => 'form-control']) }}
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                    </div> 
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) }}
                            @if($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                    </div>   
                    <div class="input-group">
                        <div class="checkbox">
                        <label>
                          <input id="remember" type="checkbox" name="remember"> Remember me
                        </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                          <button id="btn-login" type="submit" class="btn btn-success">Sign In</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account?
                            <a href="{{ URL::route('account-create') }}">
                                Sign Up Here
                            </a>
                            </div>
                        </div>
                    </div> 
                {{ Form::token() }}  
                </form>     
            </div>                     
        </div>  
    </div>
<<<<<<< HEAD
    <div class="form-group">
    	<label for="remember" class="col-sm-2 control-label">Remember Me </label>
    	<input type ="checkbox" name="remember" id="remember">
    </div>
    {{ Form::submit('Sign In')}}
    {{ Form::token() }}
</form>
@stop
=======
@stop
>>>>>>> master
