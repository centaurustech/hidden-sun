<nav class="navbar navbar-default transparent navbar-fixed-top" role="navigation" style="font-family: 'Galindo', sans-serif; font-size: 16px; z-index: 100;">
  <div class="container">
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
<<<<<<< HEAD
        <ul class="nav navbar-nav navbar-left" style="margin-left:20px">
            <li><a href="{{ URL::route('projects-discover') }}">Discover</a></li>
            @if(Auth::check())
                <li><a href="{{ URL::route('projects-create') }}">Create Project</a></li>
            @else
                <li><a href="{{ URL::route('home') }}">Fund a Project</a></li>
            @endif
            <li><a href="#">Scout Locations</a></li>
=======
        <ul class="nav navbar-nav navbar-left" style="margin-left:40px; margin-top: 5px;">
            <li><a style="color:#7E57C2;" href="{{ URL::route('projects-discover') }}">Discover</a></li>
            <li><a style="color:#66BB6A;" href="{{ URL::route('projects-create') }}">Get Funding</a></li>
            <li><a style="color:#FF7043;" href="#">Scout Locations</a></li>
>>>>>>> master
        </ul>  

        <ul class="nav navbar-nav navbar-right" style="margin-right:20px; margin-top: 5px;">
    	   @if(Auth::check())
                <li>Hello, {{ Auth::user()->first_name }}</li>
        		<li><a style="color:#66BB6A;" href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
                <li><a href="{{ URL::route('manage-account') }}">Manage Account</a></li>
                <li><a href="{{ URL::route('manage-projects') }}">My Projects</a></li>
        	@else
        		<li><a href="/account/create">Sign Up</a></li>
        		<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
        	@endif
        </ul>
    </div>
</nav>
