<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pastiche</title>

	{{-- Vendor Styles --}}
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	{{-- Custom Styles --}}
	<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">


</head>
<body>
	{{-- Navigation bar --}}
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"><i class="fa fa-navicon"></i></span>	
				</button>
          		<a class="navbar-brand user-brand" href="/">Pastiche</a>
	        </div>
			<div id="navbar" class="navbar-collapse collapse">
      			<ul class="nav navbar-nav navbar-right">
  					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
	      				<ul class="dropdown-menu dropdown-fix">
				            <li><a href="/{{ Auth::user()->username }}">Profile</a></li>
				            <li><a href="/settings">Settings</a></li>
				            <li role="separator" class="divider hidden-xs"></li>
				            <li><a href="logout">Logout</a></li>
			          	</ul>
		          	</li>
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
		<h6><a href="http://reminder.pastichean.com">Also by Wansi: Remsys</a></h6>
	</footer>

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/myscript.js') }}"></script>
</body>
</html>