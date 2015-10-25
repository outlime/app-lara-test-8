<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pastiche</title>

	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<style type="text/css">
		html { 
		  width: 100%; 
		  background-attachment: fixed;
		  height: 100%;
		}
		body {
			padding-top: 150px;
			min-height: 500px;
			font-family: 'Open Sans', sans-serif;
			text-align: center;
			background: url(http://oi58.tinypic.com/219tcn7.jpg) no-repeat;
			-webkit-background-size: cover;
		    -moz-background-size: cover;
		    background-size: cover;
		    -o-background-size: cover;
		}
		.error-msg-box{
			padding: 10%;	
		}
	</style>
</head>
<body>
    <div class="container">
    	<div class="error-msg-box">
			@yield('content')
    	</div>
    </div>
</body>
</html>