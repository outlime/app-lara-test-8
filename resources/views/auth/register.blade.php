@extends('app')

@section('content')
<<<<<<< HEAD
=======
<div class="login-register">
	<h2>Register</h2>
>>>>>>> origin/development

 <div class="omb_login">
    <h3 class="omb_authTitle">Signup or <a href="/login">Login</a></h3>

    <div class="row omb_row-sm-offset-3">
        <div class="col-xs-12 col-sm-6">
            @include('partials.messages')
        </div>
    </div>

    <div class="row omb_row-sm-offset-3">
        <div class="col-xs-12 col-sm-6">    
            <form class="omb_loginForm" action="/auth/register" autocomplete="off" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required="required">
                </div>
                <span class="help-block"></span>
                                    
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required="required">
                </div>
                <span class="help-block"></span>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required="required">
                </div>
                <span class="help-block"></span>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required="required">
                </div>
                <span class="help-block"></span>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required="required">
                </div>
                <span class="help-block"></span>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>    
</div>

@stop