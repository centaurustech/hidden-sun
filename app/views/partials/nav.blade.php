<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <h3>Film Seedr: San Antonio</h3>
    <ul class="nav navbar-nav">


    	@if(Auth::check())
            <li>Hello, {{ Auth::user()->id }}</li>
    		<li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
            <li><a href="{{ URL::route('account-change-password') }}">Change Password</a></li>
    	@else
    		<li><a href="/account/create">Sign Up</a></li>
    		<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
    	@endif
        <li><a href="{{ URL::route('home') }}">Home</a></li>
    	<li><a href="projects/create">Create Project</a></li>
    	<li><a href="projects">View Projects</a></li>
    </ul>
  </div>
</nav>