<div class="panel panel-default">
    <div class="panel-heading">
        <a class="panel-title" href="{{ $user->username }}">{{ $user->name }}</a>
    </div>
    <div class="panel-body">
        <a href="">
            <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="img-thumbnail" alt="{{ $post->caption }}" data-holder-rendered="true" style="width: 200px; height: 200px;">
        </a>
        <h4>{{ $post->caption }}</h4>
        <hr>
        <h3>
            @if ($post->isLiked(Auth::user()))
                <a class="btn btn-s btn-primary" href="/{{ $user->username }}/posts/{{ $post->id }}/unlike">
                    <i class="fa fa-star"></i> {{ count($post->likes) }}
                </a>
            @else
                <a class="btn btn-s btn-default" href="/{{ $user->username }}/posts/{{ $post->id }}/like">
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
@include('partials.modals.commentpost')