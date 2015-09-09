@extends('home')

@section('content')
	<h1>Profile</h1>

	<h3>This is the profile of {{ $user->name }}</h3>

	@if ($isFollowing)
		<a href="unfollow/{{ $user->id }}" class="btn btn-info" role="button">Unfollow</a>
	@else
		<a href="follow/{{ $user->id }}" class="btn btn-info" role="button">Follow</a>
	@endif

	<h3>Posts</h3>
	@foreach ($posts as $post)
		<article>
			<a href="{{ url('/nonexistentlink', $post->id) }}"><h5>{{ $post->picture }}</h5></a>
			<p class="body">
				{{ $post->caption }}
			</p>
		</article>
		<hr>
	@endforeach
@stop