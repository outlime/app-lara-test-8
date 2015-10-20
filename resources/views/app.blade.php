<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pastiche</title>

	<!-- styles -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ URL::asset('css/jumbotron-narrow.css') }}"> --}}
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/add.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

	@yield('content')

</body>
</html>
