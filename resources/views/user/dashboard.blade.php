@extends('home')

@section('content')
    <h1>Dashboard</h1>
    <h2>Welcome, {{ $user->name }}</h2>
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
        <li><a href="{{ $following->id }}">{{ $following->name }}</a></li>
    @endforeach
    </ul>

    <h3>My Followers</h3>
    <ul>
    @foreach ($myFollowers as $follower)
        <li><a href="{{ $follower->id }}">{{ $follower->name }}</a></li>
    @endforeach
    </ul>

    <h3>News Feed</h3>

    @if (count($posts))
        @foreach ($posts as $post)
            <article>
                <a href="{{ url('/nonexistentlink', $post->id) }}"><h5>{{ $post->picture }}</h5></a>
                <p class="body">
                    {{ $post->caption }}
                </p>
            </article>
            <hr>
        @endforeach
    @endif
    
@stop