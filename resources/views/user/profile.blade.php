@extends('home')

@section('content')
	<h1>Profile</h1>

	{{-- The current user is looking at his own profile. --}}
	@if ($user->username == $currentUser->username)

		<h3>Hello, {{ $currentUser->name }}</h3>

	{{-- The current user is looking at another user's profile. --}}
	@else

		<h3>This is the profile of {{ $user->name }}</h3>
		@if ($isFollowing)
			<a href="{{ $user->username }}/unfollow" class="btn btn-info" role="button">Unfollow</a>
		@else
			<a href="{{ $user->username }}/follow" class="btn btn-info" role="button">Follow</a>
		@endif

	@endif

	<h3>Posts</h3>
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