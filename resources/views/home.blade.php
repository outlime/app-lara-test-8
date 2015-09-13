<!DOCTYPE html>
<html>
<head>
	<title>Pastiche</title>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		<a href="/">Home</a>

		@if (Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif

		@yield('content')

		<h3><a href="auth/logout">Logout</a></h3>
	</div>
</body>
</html>