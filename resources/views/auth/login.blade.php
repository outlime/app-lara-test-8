@extends('app')

@section('content')
<div class="col-sm-1 col-md-1 col-lg-1">
	
</div>
<div class="col-sm-10 col-md-10 col-lg-10 login-main">
	<div class="login-pastiche">
		<h1>Pastiche</h1>
		<p>exhibit the artistic</p>
	</div>
	<div class="omb_login">
		<h3 class="omb_authTitle">Login or <a href="/register">Sign up</a></h3>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong>
						<br>
						Please try again.
						<br>
					</div>
				@endif
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" action="/auth/login" autocomplete="off" method="POST">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" value="{{ old('email') }}">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
	                <span class="help-block"></span>

					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			{{-- 
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" name="remember" value="RememberxMe" >
				</label>
			</div>
			 --}}
			<div class="col-xs-12 col-sm-6">
				<p class="omb_forgotPwd">
					<a href="password/email">Forgot password?</a>
				</p>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>	

		<div class="row omb_row-sm-offset-3 omb_socialButtons">
		    <div class="col-xs-4 col-sm-2">
		        <a href="oauth/facebook" class="btn btn-lg btn-block omb_btn-facebook">
			        <i class="fa fa-facebook visible-xs"></i>
			        <span class="hidden-xs">Facebook</span>
		        </a>
	        </div>
	    	<div class="col-xs-4 col-sm-2">
		        <a href="oauth/google" class="btn btn-lg btn-block omb_btn-google">
			        <i class="fa fa-google visible-xs"></i>
			        <span class="hidden-xs">Google</span>
		        </a>
	        </div>	
	    	<div class="col-xs-4 col-sm-2">
		        <a href="oauth/github" class="btn btn-lg btn-block omb_btn-github">
			        <i class="fa fa-github visible-xs"></i>
			        <span class="hidden-xs">Github</span>
		        </a>
	        </div>	
		</div>    	
	</div>
</div>

@endsection