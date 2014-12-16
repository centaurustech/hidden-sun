
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://blog.dev">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="http://blog.dev/posts">Blog</a></li>
        @if (Auth::check())
          <li><a href="http://blog.dev/posts/create">Create New Post</a></li>
        @endif
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" id="search" class="form-control" placeholder="Search By Title">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://blog.dev/resume">Resume</a></li>
        <li><a href="http://blog.dev/portfolio">Portfolio</a></li>
        <li><a href="http://instagram.com/drewzartz">Instagram</a></li>
        @if (Auth::guest())
          <li><a href="http://blog.dev/login">Log In</a></li>
        @else
          <li><a href="http://blog.dev/logout">Log Out</a></li>
        @endif
      </ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>