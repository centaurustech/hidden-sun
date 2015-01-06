<!DOCTYPE html>
<html lang="en">
	@include('partials.header')
<body>
	@include('partials.nav')
	<div class="container-fluid" id="primary-container">
		<div class="row" id="primary-row">
			<!-- Checks if variable global exists and outputs the value. -->
			@if(Session::has('global'))
				<div class="alert alert-success" role="alert">
					<p>{{ Session::get('global') }}</p>
				</div>
			@endif
		    @yield('content')
		</div>
	</div>
	@include('partials.footer')
</body>
</html>
