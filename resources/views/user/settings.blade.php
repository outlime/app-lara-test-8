@extends('home')

@section('content')
	<div class="container">
				
		<h1>Settings</h1>

		{{-- Navigation tabs --}}
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
			<li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
			<li role="presentation"><a href="#themes" aria-controls="themes" role="tab" data-toggle="tab">Themes</a></li>
		</ul>
		
		{{-- If user logged in using another service --}}
		@if (Auth::user()->isOauth())
			{{-- Tab content --}}
			<div class="tab-content">
				{{-- Profile tab --}}
				<div role="tabpanel" class="tab-pane active" id="profile">
					{{-- Profile form --}}
					<div class="row">
						<form action="changeprofile" autocomplete="off" class="col-sm-6 col-md-6 col-lg-6" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label" for="name">Name</label>
								<input disabled type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $user->name }}">
							</div>
							<div class="form-group">
								<label class="control-label" for="email">Email</label>
								<input disabled type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}">
							</div>
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<div class="input-group">
									<input disabled type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ $user->username }}">
									<span class="input-group-btn">
										<button disabled class="btn btn-default" type="button" data-container="body" data-toggle="popover" data-placement="right" data-content="Username changes are not supported at this time.">
											<i class="fa fa-question-circle"></i>
										</button>
									</span>
								</div>
							</div>
							<div class="form-group {{ print_r($errors->first('bio') ? 'has-error' : null, true) }}">
								<label class="control-label" for="bio">Bio</label>
								<input type="text" class="form-control" id="bio" name="bio" value="{{ old('bio') ? old('bio') : $user->bio }}">
							</div>
							<div class="form-group {{ print_r($errors->first('website') ? 'has-error' : null, true) }}">
								<label class="control-label" for="website">Website</label>
								<input type="text" class="form-control" id="website" placeholder="http://" name="website" value="{{ old('website') ? old('website') : $user->website }}">
							</div>
							<hr>
							<button type="submit" class="btn btn-pastiche">Save changes</button>
						</form>
					</div>
				</div>

				{{-- Password tab --}}
				<div role="tabpanel" class="tab-pane" id="password">
					{{-- Password form --}}
					<div class="row">
						<form action="" autocomplete="off" class="col-sm-6 col-md-6 col-lg-6" method="POST">
							<div class="form-group">
								<label class="control-label" for="oldpassword">Old password</label>
								<input disabled type="password" class="form-control" id="oldpassword" name="oldpassword">
							</div>
							<div class="form-group">
								<label class="control-label" for="password">New password</label>
								<input disabled type="password" class="form-control" id="password" name="password">
							</div>
							<div class="form-group">
								<label class="control-label" for="passwordconfirmation">Confirm new password</label>
								<input disabled type="password" class="form-control" id="passwordconfirmation" name="password_confirmation">
							</div>
							<hr>
							<button disabled type="submit" class="btn btn-pastiche">Save changes</button>
						</form>
					</div>
				</div>

				{{-- Themes tab --}}
				<div role="tabpanel" class="tab-pane" id="themes">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<h3>Website Themes</h3>
							<h4><span class="label label-primary">Coming Soon</span></h4>
						</div>
					</div>
				</div>
			</div>

		{{-- Else if user logged in using Pastiche --}}
		@else
			{{-- Tab content --}}
			<div class="tab-content">
				{{-- Profile tab --}}
				<div role="tabpanel" class="tab-pane active" id="profile">
					{{-- Profile form --}}
					<div class="row">
						<form action="changeprofile" autocomplete="off" class="col-sm-6 col-md-6 col-lg-6" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group {{ print_r($errors->first('name') ? 'has-error' : null, true) }}">
								<label class="control-label" for="name">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') ? old('name') : $user->name }}">
							</div>
							<div class="form-group {{ print_r($errors->first('email') ? 'has-error' : null, true) }}">
								<label class="control-label" for="email">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') ? old('email') : $user->email }}">
							</div>
							<div class="form-group {{ print_r($errors->first('username') ? 'has-error' : null, true) }}">
								<label class="control-label" for="username">Username</label>
								<div class="input-group">
									<input readonly type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ $user->username }}">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" data-container="body" data-toggle="popover" data-placement="right" data-content="Username changes are not supported at this time.">
											<i class="fa fa-question-circle"></i>
										</button>
									</span>
								</div>
							</div>
							<div class="form-group {{ print_r($errors->first('bio') ? 'has-error' : null, true) }}">
								<label class="control-label" for="bio">Bio</label>
								<input type="text" class="form-control" id="bio" name="bio" value="{{ old('bio') ? old('bio') : $user->bio }}">
							</div>
							<div class="form-group {{ print_r($errors->first('website') ? 'has-error' : null, true) }}">
								<label class="control-label" for="website">Website</label>
								<input type="text" class="form-control" id="website" placeholder="http://" name="website" value="{{ old('website') ? old('website') : $user->website }}">
							</div>
							<hr>
							<button type="submit" class="btn btn-pastiche">Save changes</button>
						</form>
					</div>
				</div>

				{{-- Password tab --}}
				<div role="tabpanel" class="tab-pane" id="password">
					{{-- Password form --}}
					<div class="row">
						<form action="changepassword" autocomplete="off" class="col-sm-6 col-md-6 col-lg-6" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label" for="oldpassword">Old password</label>
								<input type="password" class="form-control" id="oldpassword" name="oldpassword">
							</div>
							<div class="form-group">
								<label class="control-label" for="password">New password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
							<div class="form-group">
								<label class="control-label" for="passwordconfirmation">Confirm new password</label>
								<input type="password" class="form-control" id="passwordconfirmation" name="password_confirmation">
							</div>
							<hr>
							<button type="submit" class="btn btn-pastiche">Save changes</button>
						</form>
					</div>
				</div>

				{{-- Themes tab --}}
				<div role="tabpanel" class="tab-pane" id="themes">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<h3>Website Themes</h3>
							<h4><span class="label label-primary">Coming Soon</span></h4>
						</div>
					</div>
				</div>
			</div>
		@endif

	</div>
@stop