@extends('home')

@section('content')
	{{-- Separate posts, following and followers to different pages if necessary --}}
	{{-- The current user is looking at his own profile. --}}
	@if ($user->username == $currentUser->username)

		<div class="jumbotron">
			<h2>Hello, {{ $currentUser->name }}</h2>

			<hr>

			<div class="row">
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->followers) }} Followers</a>
				</div>
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->following) }} Following</a>
				</div>
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->posts) }} Posts</a>
				</div>
			</div>
		</div>

		<div class="row">
        	<div class="col-md-5">

				<h1>My Posts</h1>
				@foreach($user->posts as $post)
		            @include('partials.post')
			    @endforeach

			    @if (count($user->posts) == 0)
					<p>You do not have any posts.</p>
			    @endif

				<hr>

			    <h1>My Followers</h1>
			    @foreach($user->followers as $follower)
					<p>{{ $follower->name }}</p>
					<hr>
			    @endforeach

			    @if (count($user->posts) == 0)
					<p>You are too lonely!</p>
			    @endif

	    	</div>
        </div>

	{{-- The current user is looking at another user's profile. --}}
	@else

		<div class="jumbotron">
			<h2>{{ $user->name }}</h2>

			<hr>

			<div class="row">
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->followers) }} Followers</a>
				</div>
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->following) }} Following</a>
				</div>
				<div class="col-md-4">
					<a href="" class="btn btn-lg btn-block">{{ count($currentUser->posts) }} Posts</a>
				</div>
			</div>

			<hr>

			@if ($isFollowing)
				<a href="{{ $user->username }}/unfollow" class="btn btn-primary" role="button">Unfollow</a>
			@else
				<a href="{{ $user->username }}/follow" class="btn btn-primary" role="button">Follow</a>
			@endif
      	</div>

      	<div class="row">
            <div class="col-md-5">

		      	<h1>Posts</h1>
				@foreach($user->posts as $post)
		            @include('partials.post')
			    @endforeach

			    @if (count($user->posts) == 0)
					<p>This user does not have any posts.</p>
			    @endif

				<hr>

			    <h1>Followers</h1>
			    <div class="list-group">
					@foreach ($user->followers as $follower)
						<a href="{{ $follower->username }}" class="list-group-item">
							<h4>{{ $follower->name }}</h4>
						</a>
					@endforeach
				</div>

			    @if (count($user->posts) == 0)
					<p>Be the first to follow this lonely person!</p>
			    @endif

            </div>
        </div>

	@endif
	<hr>
@stop