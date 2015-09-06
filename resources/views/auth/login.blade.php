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

    <a href="/register">Create an account here</a>
</div>
@endsection