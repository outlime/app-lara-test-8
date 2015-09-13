<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pastiche</title>

	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
          		<a class="navbar-brand" href="/">PASTICHE</a>
	        </div>
			<div id="navbar" class="navbar-collapse collapse">

      			<ul class="nav navbar-nav navbar-right">
      				<li><a href="/{{ Auth::user()->username }}">{{ Auth::user()->name }}</a></li>
      				<li><a href="auth/logout">Logout</a></li>
      			</ul>
      			{{-- Search not functional --}}
  				<form class="navbar-form navbar-right">
			    	<input type="text" class="form-control" placeholder="Search...">
			    </form>
      		</div>
		</div>
	</nav>

	<div class="container">

		@yield('content')

	</div>

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>


{{-- @if (Session::has('flash_message'))
	<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
@endif --}}