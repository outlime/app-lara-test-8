@extends('home')

@section('content')
    <div class="jumbotron">
        <div class="container">
            {{-- Jumbotron content --}}
            <h1>Inspire.</h1>
            <p>Post something now.</p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#postModal">Post</button>
            
            {{-- Create a post modal --}}
            <div id="postModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Make a new post</h4>
                        </div>
                        <div class="modal-body">
                            {{-- app.php in config has been modified for form. Be noted. --}}
                            {{-- Create a post form --}}
                            <form method="POST" action="/newpost" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    {{-- Refactor 'picture' to 'image' perhaps? --}}
                                    <input type="file" name="picture" required="required" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="caption" required="required" class="form-control" placeholder="Caption">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- News Feed Area --}}
    <div class="page-header">
        <h1>News Feed</h1>
        {{-- Cycle through followed users --}}
        @foreach ($myFollowing as $following)
            {{-- Cycle through posts of user --}}
            @foreach($following->posts()->get() as $post)
                <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="panel-title" href="{{ $following->username }}">{{ $following->name }}</a>
                </div>
                    <div class="panel-body">
                        <a href="">
                            <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="img-thumbnail" alt="{{ $post->caption }}" data-holder-rendered="true" style="width: 200px; height: 200px;">
                        </a>
                        <h4>{{ $post->caption }}</h4>
                        <hr>
                        <h3>
                            @if ($post->isLiked(Auth::user()))
                                <a class="btn btn-s btn-primary" href="/{{ $following->username }}/posts/{{ $post->id }}/unlike">
                                    <i class="fa fa-star"></i> {{ count($post->likes) }}
                                </a>
                            @else
                                <a class="btn btn-s btn-default" href="/{{ $following->username }}/posts/{{ $post->id }}/like">
                                    <i class="fa fa-star"></i> {{ count($post->likes) }}
                                </a>
                            @endif

                            <a class="btn btn-s btn-default" href="" data-toggle="modal" data-target="#commentModal{{ $post->id }}">
                                <i class="fa fa-comment"></i> {{ count($post->comments) }}
                            </a>
                        </h3>
                    </div>
                </div>

                {{-- Comment modal --}}
                {{-- Usage of id in commentModal may be unsafe --}}
                <div id="commentModal{{ $post->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4>Comments</h4>
                            </div>
                            <div class="modal-body">
                               {{-- Comment form --}}
                                <form method="POST" action="/{{ $following->username }}/posts/{{ $post->id }}/comment">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" name="comment" class="form-control" placeholder="Type a comment here..." required="required">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </form>
                                <hr>
                                {{-- Comments --}}
                                <ul class="list-group">
                                    @foreach ($post->comments as $comment)
                                        <li class="list-group-item">
                                            <a href="/{{ $comment->user->username }}" class="">
                                                {{ $comment->user->name }}
                                            </a>
                                            {{ $comment->comment }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    
@stop