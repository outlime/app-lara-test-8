<div class="panel panel-default">
    <div class="panel-heading">
        <a class="panel-title" href="{{ $post->user->username }}">{{ $post->user->name }}</a>
        @if (Auth::user()->id == $post->user->id)
            <a type="button" class="close" href="{{ $post->user->username }}/posts/{{ $post->id }}/remove">&times;</a>
        @endif
    </div>
    <div class="panel-body">
        <a href="" data-toggle="modal" data-target="#postModal{{ $post->id }}">
            <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="img-thumbnail" alt="{{ $post->caption }}" data-holder-rendered="true" stylex="width: 200px; height: 200px;">
        </a>
        <hr>
        <h4>{{ $post->caption }}</h4>
        <hr>
        <h3>
            @if ($post->isLiked(Auth::user()))
                <a class="btn btn-s btn-pastiche-dark" href="/{{ $post->user->username }}/posts/{{ $post->id }}/unlike">
                    Unlike <i class="fa fa-heart"></i> {{ count($post->likes) }}
                </a>
            @else
                <a class="btn btn-s btn-pastiche" href="/{{ $post->user->username }}/posts/{{ $post->id }}/like">
                    Like <i class="fa fa-heart"></i> {{ count($post->likes) }}
                </a>
            @endif

            <a class="btn btn-s btn-pastiche" href="" data-toggle="modal" data-target="#commentModal{{ $post->id }}">
                Comment <i class="fa fa-comment"></i> {{ count($post->comments) }}
            </a>
        </h3>
    </div>
</div>

{{-- Comment modal --}}
@include('partials.modals.commentModal')

{{-- Post modal --}}
@include('partials.modals.postModal')