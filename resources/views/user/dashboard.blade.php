@extends('home')

@section('content')
    <div class="jumbotron">
        <div class="container">
            {{-- Jumbotron content --}}
            <h1>Inspire.</h1>
            <p>Post something now.</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPostModal">Post</button>
            
            {{-- Create a post modal --}}
            @include('partials.modals.createpost')
        </div>
    </div>

    {{-- News Feed Area --}}
    <div class="page-header">
        <h1>News Feed</h1>
        {{-- Cycle through followed users --}}
        @foreach ($myFollowing as $user)
            {{-- Cycle through posts of user --}}
            @foreach($user->posts as $post)
                <div class="row">
                    <div class="col-md-5">
                        @include('partials.post')
                    </div>
                </div>
            @endforeach
        @endforeach

        @if (count(Auth::user()->following) == 0)
            <h4>This place is too lonely! Follow somebody to populate your news feed.</h4>
        @endif
    </div>
    
@stop