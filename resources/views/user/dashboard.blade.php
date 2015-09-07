@extends('home')

@section('content')
    <h1>Dashboard</h1>

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
    
@stop