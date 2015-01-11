@extends('layouts.master')
@section('content')

<h1>Sign Up</h1>
<div class="container" id="sign-up">
{{Form::open(['action' => 'HomeController@showSignupPage'])}}
    <p><label for="first_name">First Name</label><br>
        {{ Form::text('first_name', Input::old('first_name'), ['placeholder' => 'John']) }} <br>
    </p>
    
    <p><label for="last_name">Last Name</label><br>
        {{ Form::text('last_name', Input::old('last_name'), ['placeholder' => 'Smith']) }} <br>
    </p>
    
    <p><label for="city">City</label><br>
        {{ Form::text('city', Input::old('city'), ['placeholder' => 'City']) }} <br>
    </p>
    
    <p><label for="state">State</label><br>
        {{ Form::text('state', Input::old('state'), ['placeholder' => 'State']) }} <br>
    </p>
    
    <p><label for="email">Email</label><br>
        {{ Form::text('email', Input::old('email'), ['placeholder' => 'johnsmith@example.com', 'class' => 'form-control']) }} <br>
    </p>
    
    <p><label for="password">Password</label><br>
        {{ Form::text('password', Input::old('password'), ['placeholder' => 'Password']) }} <br>
    </p>
    
    <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
    </div>
    
    <button type="submit">Submit</button>
</div>

@stop