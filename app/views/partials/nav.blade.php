<nav class="navbar navbar-default transparent navbar-fixed-top" role="navigation" style="font-family: 'Galindo', sans-serif; font-size: 16px; z-index: 100;">
  <div class="container">
    <span style="position:absolute;left:0px;top:0px;font-size:12px;color:red;">[beta]</span>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a style="color:black; text-decoration:none;" href="{{ URL::route('home') }}">
            <h3>Film Seedr</h3>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1" style="padding-left:20px;">
        <ul class="nav navbar-nav navbar-left" style="margin-left:40px; margin-top: 5px;">
            <li><a style="color:#FF7043;" href="{{ URL::route( 'about' )}}">About Us</a></li>
            <li><a style="color:#7E57C2;" href="{{ URL::route('projects-discover') }}">Discover</a></li>
            <li><a style="color:#66BB6A;" href="{{ URL::route('projects-create') }}">Get Funded</a></li>
        </ul>  
    	   @if(Auth::check())
            <ul class="nav navbar-nav navbar-right" style="margin-left:50px;margin-right:0px;margin-top: 5px;">
                <li id="account-dropdown" class="dropdown">
                    <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="{{ URL::route('manage-projects') }}" role="menuitem" tabindex="-1">My Projects</a></li>
                            <li role="presentation"><a href="{{ URL::route('profile-user', Auth::user()->id) }}" role="menuitem" tabindex="-1">My Profile</a></li>
                            <li role="presentation"><a href="{{ URL::route('manage-account') }}" role="menuitem" tabindex="-1">Manage Account</a></li>
                        </ul>
                </li>
                <li><a style="color:black;" href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
            </ul>
        	@else
                <ul class="nav navbar-nav navbar-right" style="margin-right:20px; margin-top: 5px;">
        		  <li><a href="/account/create">Sign Up</a></li>
        		  <li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
                </ul>
        	@endif
    </div>
</nav>
