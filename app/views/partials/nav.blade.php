<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="font-family: 'Slackey', cursive; font-size: 18px;">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{ URL::route('home') }}">
            <h3>Film Seedr: San Antonio</h3>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1" style="padding-left:20px;">
        <ul class="nav navbar-nav navbar-left" style="margin-left:20px">
            <li><a href="{{ URL::route('projects-discover') }}">Discover</a></li>
            <li><a href="{{ URL::route('projects-create') }}">Get Funding</a></li>
            <li><a href="#">Scout Locations</a></li>
        </ul>  

        <ul class="nav navbar-nav navbar-right" style="margin-right:20px;">
    	   @if(Auth::check())
                <li>Hello, {{ Auth::user()->first_name }}</li>
        		<li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
                <li><a href="{{ URL::route('account-change-password') }}">Account Settings</a></li>
        	@else
        		<li><a href="/account/create">Sign Up</a></li>
        		<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
        	@endif
        </ul>
    </div>
</nav>
@if (Request::path() == 'projects/discover')
    @yield('genres-nav')
@endif

