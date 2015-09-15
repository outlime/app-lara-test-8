<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pastiche</title>

	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<style type="text/css">

		body {
			padding-top: 150px;
			min-height: 500px;
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