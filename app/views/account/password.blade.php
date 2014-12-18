@extends('layouts.master')
@section('content')
<form class="form-horizontal" role="form" action="{{ URL::route('account-change-password-post') }}" method="post">
    <div class="form-group">    
        <label for="old_password" class="col-sm-2 control-label">Old Password</label>
        <div class="col-sm-10">
         	<input type="password" name="old_password">
         	@if($errors->has('old_password'))
         		{{ $errors->first('old_password') }}
         	@endif
        </div>
    </div>    
    <div class="form-group">    
        <label for="new_password" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
         	<input type="password" name="new_password">
         	@if($errors->has('new_password'))
         		{{ $errors->first('new_password') }}
         	@endif
        </div>
    </div> 
    <div class="form-group">    
        <label for="new_password_again" class="col-sm-2 control-label">New Password (again)</label>
        <div class="col-sm-10">
         	<input type="password" name="new_password_again">
         	@if($errors->has('new_password_again'))
         		{{ $errors->first('new_password_again') }}
         	@endif
        </div>
    </div> 
    {{ Form::submit('Change Password')}}
    {{ Form::token() }}
</form>
@stop