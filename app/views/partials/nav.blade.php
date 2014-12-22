<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <img class="placeholder" src="/images/placeholder.png">
    <h3>Film Seedr: San Antonio</h3>
    <ul class="nav navbar-nav">
    	@if(Auth::check())
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
        <form class="navbar-form navbar-right">
            <input type="text" name="search" class="form-control" placeholder="Search...">
            <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{{ action('HomeController@showLogin') }}}"></a></li>
                    @else
                            <li>Welcome, {{{ Auth::user()->first_name }}}!</li>
                    @endif
            </ul>
            <img class="placeholder2" src="/images/person-placeholder.png">
        </form>
        
    </div>
  </div>
</nav>

