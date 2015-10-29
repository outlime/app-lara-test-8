<div class="panel panel-default">
    <a href="" data-toggle="modal" data-target="#postModal{{ $post->id }}">
        {{-- <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="post-img" alt="{{ $post->caption }}" data-holder-rendered="true"> --}}
        <div class="ratio" style="background-image:url('{{ URL::asset('uploads/posts') }}/{{ $post->picture }}')" /></div>
    </a>

    <div class="btn-group btn-group-justified">
        @if ($post->isLiked(Auth::user()))
            <a class="btn btn-xs btn-pastiche-dark sharp" href="/{{ $post->user->username }}/posts/{{ $post->id }}/unlike">
                <span class="hidden-xs">Unlike</span>
                <i class="fa fa-heart"></i> {{ count($post->likes) }}
            </a>
        @else
            <a class="btn btn-xs btn-pastiche sharp" href="/{{ $post->user->username }}/posts/{{ $post->id }}/like">
                <span class="hidden-xs">Like</span>
                <i class="fa fa-heart"></i> {{ count($post->likes) }}
            </a>
        @endif

        <a class="btn btn-xs btn-pastiche sharp" href="" data-toggle="modal" data-target="#commentModal{{ $post->id }}">
            <span class="hidden-xs">Comment</span>
            <i class="fa fa-comment"></i> {{ count($post->comments) }}
        </a>
    </div>
    
    <div class="panel-footer">
        <div class="row">
            {{-- User and Caption --}}
            <div class="col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object profile-pic-sm" src="{{ URL::asset('uploads/userprofile') }}/{{ $post->user->profile_pic }}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        @if (Auth::user()->id == $post->user->id)
                            <a type="button" class="close" href="{{ $post->user->username }}/posts/{{ $post->id }}/remove">&times;</a>
                        @endif
                        <h4 class="media-heading">
                            <a href="{{ $post->user->username }}">{{ $post->user->name }}</a>
                        </h4>
                        <h5>{{ $post->caption }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Comment modal --}}
@include('partials.modals.commentModal')

{{-- Post modal --}}
@include('partials.modals.postModal')