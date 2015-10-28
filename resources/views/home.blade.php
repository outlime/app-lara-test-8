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
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">

	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

</head>
<body>
	{{-- Navigation bar --}}
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
          		<a class="navbar-brand user-brand" href="/">Pastiche</a>
	        </div>
			<div id="navbar" class="navbar-collapse collapse">
      			<ul class="nav navbar-nav navbar-right">
      				<li><a href="/{{ Auth::user()->username }}">{{ Auth::user()->name }}</a></li>
      				<li><a href="logout">Logout</a></li>
      			</ul>
  				<form class="navbar-form navbar-right" method="POST" action="/search">
  					<input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<div class="input-group">
			    		<input type="text" class="form-control" name="query" placeholder="Search...">
  						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
  					</div>
			    </form>
      		</div>
		</div>
	</nav>

	<div class="container">
		@include('partials.messages')
		@yield('content')
	</div>

	<footer class="footer">
		<h5>Copyright &copy; Wansi 2015.</h5>
	</footer>

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>