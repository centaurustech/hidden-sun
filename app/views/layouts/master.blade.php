<!DOCTYPE html>
<html lang="en">
	@include('partials.header')
<body>
	@include('partials.nav')
	<div class="row" id="primary-row">
		<div class="container" id="primary-container">
		    @yield('content')
		</div>
	</div>
	@include('partials.footer')
</body>
</html>
