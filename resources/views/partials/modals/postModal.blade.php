<div id="postModal{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
                {{-- Modal header: caption --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                {{ $post->caption }} 
            </div>
            <div class="modal-body">
                {{-- Modal body: picture --}}
                <img src="{{ URL::asset('images/pre/' . $post->picture) }}" class="img-thumbnail post-img-modal center-block" alt="{{ $post->caption }}" data-holder-rendered="true">
            </div>
            <div class="modal-footer">
                {{-- Modal footer: other info --}}
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object profile-pic-sm" src="{{ URL::asset('images/usm/' . $post->user->profile_pic) }}" alt="">
                        </a>
                    </div>
                    <div class="media-body text-left">
                        <a type="button" class="close" data-toggle="tooltip" data-placement="left" title="Download Full Resolution" href="{{ URL::asset('images/original/' . $post->picture) }}" target="_blank"><i class="fa fa-download"></i></a>
                        <h4 class="media-heading">
                            <a href="{{ $post->user->username }}">{{ $post->user->name }}</a>
                            <small data-toggle="tooltip" data-placement="top" title="{{ $post->datePublished() }}">{{ $post->datePublishedDiff() }}</small>
                            @if (Auth::user()->id == $post->user->id)
                                <a type="button" data-toggle="tooltip" data-placement="top" title="Delete Post" href="{{ $post->user->username }}/posts/{{ $post->id }}/remove"><i class="fa fa-trash"></i></a>
                            @endif
                        </h4>
                        <h5>
                            <i class="fa fa-heart-o"></i> {{ count($post->likes) }}
                            |
                            <i class="fa fa-comment-o"></i> {{ count($post->comments) }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>