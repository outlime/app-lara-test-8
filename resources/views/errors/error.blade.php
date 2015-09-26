<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pastiche</title>
	<!--DOWNLOAD THIS-->
	<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<!--Palipat sa iba-->
	<style>
		body {
			padding-top: 150px;
			min-height: 500px;
			font-family: "Raleway", sans-serif;
			text-align: center;
		}
	</style>
</head>
<body>
    <div class="container">
    	<div class="jumbotron">
			@yield('content')
    	</div>
    </div>
</body>
</html>