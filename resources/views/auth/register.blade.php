@extends('app')

@section('content')
<div class="login-register">
	<h2>Register</h2>

	@include('partials.messages')

    <form method="POST" action="/auth/register">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

    	<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required="required">
    	<input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required="required">
    	<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required="required">
		<input type="password" name="password" placeholder="Password" required="required">
		<input type="password" name="password_confirmation" placeholder="Confirm Password" required="required">

        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>

    </form>

    <a href="/">Login here</a>
</div>
@stop