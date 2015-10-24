@extends('app')

@section('content')
<<<<<<< HEAD
<div class="col-sm-1 col-md-1 col-lg-1 ">
    
</div>
<div class="login-main col-sm-10 col-md-10 col-lg-10">
    <div class="login-pastiche">
        <h1>Pastiche</h1>
        <p>exhibit the artistic</p>
=======
 <div class="omb_login">
    <h3 class="omb_authTitle">Signup or <a href="/login">Login</a></h3>

    <div class="row omb_row-sm-offset-3">
        <div class="col-xs-12 col-sm-6">
            @include('partials.messages')
        </div>
>>>>>>> origin/development
    </div>
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
</div>
@stop