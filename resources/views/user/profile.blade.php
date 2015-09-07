@extends('home')

@section('content')
	<h1>Profile</h1>

	<h3>This is the profile of {{ $user->name }}</h3>

	@if ($isFollowing)
		<a href="unfollow/{{ $user->id }}" class="btn btn-info" role="button">Unfollow</a>
	@else
		<a href="follow/{{ $user->id }}" class="btn btn-info" role="button">Follow</a>
	@endif
@stop