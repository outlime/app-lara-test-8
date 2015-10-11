@extends('app')

@section('content')
<div class="login-register">
	<h1>Register</h1>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

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