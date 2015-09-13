@extends('home')

@section('content')
	<h1>{{ $post->picture }}</h1>
	<h2>{{ $post->caption }}</h2>

	@if ($isLiked)
		<a class="btn btn-info" href="/{{ $user->username }}/posts/{{ $post->id }}/unlike">Unlike</a>
	@else
		<a class="btn btn-info" href="/{{ $user->username }}/posts/{{ $post->id }}/like">Like</a>
	@endif
	
	@if (count($post->likes) == 1)
		<h5>{{ count($post->likes) }} like</h5>
	@else
		<h5>{{ count($post->likes) }} likes</h5>
	@endif

	@if (count($post->comments) == 1)
		<h5>{{ count($post->comments) }} comment</h5>
	@else
		<h5>{{ count($post->comments) }} comments</h5>
	@endif

	<form method="POST" action="/{{ $user->username }}/posts/{{ $post->id }}/comment">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<textarea rows="2" name="comment" placeholder="Type a comment here..." required="required"></textarea>
		<br>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>

	<h3>Comments</h3>
	<ul>
	@foreach ($post->comments as $comment)
		<li>{{ $comment->comment }}</li>
	@endforeach
	</ul>

@endsection