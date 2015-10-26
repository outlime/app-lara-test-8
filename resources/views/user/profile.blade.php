@extends('home')

@section('content')
	{{-- Separate posts, following and followers to different pages if necessary --}}
	{{-- The current user is looking at his own profile. --}}
	@if ($user->username == $currentUser->username)

		<div class=" row col-sm-12 col-md-12 col-lg-12">
			<div class="user-info col-sm-4 col-md-4 col-lg-4">
				<h3>{{ $currentUser->name }}</h3>
				<hr>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" data-toggle="modal" data-target="#profileFollowerModal" class="btn btn-lg btn-block">{{ count($currentUser->followers) }} Followers</a>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" data-toggle="modal" data-target="#profileFollowingModal" class="btn btn-lg btn-block">{{ count($currentUser->following) }} Following</a>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->posts) }} Posts</a>
				</div>
			</div> 
			<div class="row col-sm-8 col-md-8 col-lg-8 right-block">
				<div class="col-sm-10 col-md-10 col-lg-10 center-block">
					<h1>My Posts</h1>
					@foreach($user->posts as $post)
			            @include('partials.post')
				    @endforeach

				    @if (count($user->posts) == 0)
						<p>You do not have any posts.</p>
				    @endif

					<hr>
		    	</div>
	        </div>
		</div>
		

	{{-- The current user is looking at another user's profile. --}}
	@else
		<div class=" row col-sm-12 col-md-12 col-lg-12">
			<div class="user-info col-sm-4 col-md-4 col-lg-4">
				<h3>{{ $user->name }}</h3>
				<hr>
				@if ($isFollowing)
					<a href="{{ $user->username }}/unfollow" class="btn btn-pastiche btn-follow" role="button">Unfollow</a>
				@else
					<a href="{{ $user->username }}/follow" class="btn btn-pastiche btn-follow" role="button">Follow</a>
				@endif
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" data-toggle="modal" data-target="#profileFollowerModal" class="btn btn-lg btn-block">{{ count($user->followers) }} Followers</a>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" data-toggle="modal" data-target="#profileFollowingModal" class="btn btn-lg btn-block">{{ count($user->following) }} Following</a>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a href="" class="btn btn-lg btn-block">{{ count($user->posts) }} Posts</a>
				</div>
			</div> 
			<div class="row col-sm-8 col-md-8 col-lg-8 right-block">
				<div class="col-sm-10 col-md-10 col-lg-10 center-block">
					<h1>Posts</h1>
					@foreach($user->posts as $post)
			            @include('partials.post')
				    @endforeach

				    @if (count($user->posts) == 0)
						<p>This user hasn't posted anything yet.</p>
				    @endif

					<hr>
				</div>
	        </div>
		</div>

	@endif
	<hr>

	{{-- Profile modal --}}
	@include('partials.modals.profileModal')
@stop

