@extends('home')

@section('content')
    <h1>Dashboard</h1>
    <h2>Welcome, <a href="/{{ $currentUser->username }}">{{ $currentUser->name }}</a></h2>
    <hr>

    {{-- Create a new post area --}}
    <h3>Create post</h3>
    <form method="POST" action="/newpost">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{-- Picture is text for now. Will be changed to real picture later. --}}
        <input type="text" name="picture" required="required" />
        <br>
        <input type="text" name="caption" placeholder="Caption" required="required" />
        <br>

        <button type="submit" class="btn btn-primary">Post</button>
    </form>

    <h3>My Following</h3>
    <ul>
    @foreach ($myFollowing as $following)
        <li><a href="{{ $following->username }}">{{ $following->name }}</a></li>
    @endforeach
    </ul>

    <h3>My Followers</h3>
    <ul>
    @foreach ($myFollowers as $follower)
        <li><a href="{{ $follower->username }}">{{ $follower->name }}</a></li>
    @endforeach
    </ul>

    <h3>News Feed</h3>
    @foreach ($myFollowing as $following)
        @foreach($following->posts()->get() as $post)
            <article>
                <h4>Posted by: {{ $following->name }}</h4>
                <a href="/{{ $following->username }}/posts/{{ $post->id }}"><h5>{{ $post->picture }}</h5></a>
                <p class="body">
                    {{ $post->caption }}
                </p>
            </article>
            <hr>
        @endforeach
    @endforeach
    
@stop