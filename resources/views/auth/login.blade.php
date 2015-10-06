@extends('app')

@section('content')
<div class="login-register">
	<h1>Pastiche</h1>

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong>
		<br>
		Please try again.
		<br>
	</div>
	@endif

    <form method="POST" action="/auth/login">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

    	<input type="email" name="email" placeholder="Email" required="required" value="{{ old('email') }}" />
        <input type="password" name="password" placeholder="Password" required="required" />

        <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
	
	<hr>
	<a class="btn btn-primary btn-block btn-large" href="oauth/facebook">
    	<i class="fa fa-facebook"></i>
    	Facebook
	</a>  
	<a class="btn btn-primary btn-block btn-large" href="oauth/google">
    	<i class="fa fa-google"></i>
    	Google
	</a>  
    <a class="btn btn-primary btn-block btn-large" href="oauth/github">
    	<i class="fa fa-github"></i>
    	Github
	</a>  

    <a href="/register">Create an account here</a>
</div>
@endsection