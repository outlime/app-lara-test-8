@extends('home')

@section('content')
    <div class="jumbotron">
        <div class="container">
            {{-- Jumbotron content --}}
            <h1>Inspire.</h1>
            <p>Post something now.</p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#postModal">Post</button>
            
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
            @foreach($user->posts()->get() as $post)
                <div class="col-md-6">
                    @include('partials.post')
                </div>
            @endforeach
        @endforeach
    </div>
    
@stop