@extends('home')

@section('content')
	{{-- The current user is looking at his own profile. --}}
	@if ($user->username == $currentUser->username)

		<div class="jumbotron">
			<h2>Hello, {{ $currentUser->name }}</h2>
			<hr>
			<h4>
				{{ count($currentUser->followers) }} Followers
			</h4>
			<h4>
				{{ count($currentUser->following) }} Following
			</h4>
			<h4>
				{{ count($currentUser->posts) }} Posts
			</h4>
      	</div>

	{{-- The current user is looking at another user's profile. --}}
	@else

		<div class="jumbotron">
			<h2>{{ $user->name }}</h2>
			<hr>
			<h4>
				{{ count($user->followers) }} Followers
			</h4>
			<h4>
				{{ count($user->following) }} Following
			</h4>
			<h4>
				{{ count($user->posts) }} Posts
			</h4>
			<hr>
			@if ($isFollowing)
				<a href="{{ $user->username }}/unfollow" class="btn btn-info" role="button">Unfollow</a>
			@else
				<a href="{{ $user->username }}/follow" class="btn btn-info" role="button">Follow</a>
			@endif
      	</div>

	@endif

	<h1>Posts</h1>
	@foreach ($posts as $post)
		<article>
			<a href="/{{ $user->username }}/posts/{{ $post->id }}"><h5>{{ $post->picture }}</h5></a>
			<p class="body">
				{{ $post->caption }}
			</p>
		</article>
		<hr>
	@endforeach
@stop