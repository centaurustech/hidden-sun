<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <h3>Film Seedr: San Antonio</h3>
    <ul class="nav navbar-nav">

    	@if(Auth::check())
    		<li><a href="#signout">Sign Out</a></li>
    	@else
    		<li><a href="/account/create">Sign Up</a></li>
    		<li><a href="login">Log In</a></li>
    	@endif
    	<li><a href="projects/create">Create Project</a></li>
    	<li><a href="projects">View Projects</a></li>
    </ul>
  </div>
</nav>