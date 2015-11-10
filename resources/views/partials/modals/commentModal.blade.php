<div id="commentModal{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Comments</h4>
            </div>
            <div class="modal-body">
               {{-- Comment form --}}
                <form method="POST" action="/{{ $post->user->username }}/posts/{{ $post->id }}/comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" placeholder="Type a comment here..." required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-pastiche">Comment</button>
                    </div>
                </form>
                <hr>
                {{-- Comments --}}
                <ul class="media-list">
                    @foreach ($post->comments as $comment)
                        <li class="media">
                            <div class="media-left">
                                <img class="profile-pic-sm media-object" src="{{ URL::asset('images/usm/' . $comment->user->profile_pic) }}" alt="">
                            </div>
                            <div class="media-body">
                                @if (Auth::user()->id == $comment->user->id)
                                    <a type="button" class="close" data-toggle="tooltip" data-placement="left" title="Remove Comment" href="{{ $post->user->username }}/posts/{{ $post->id }}/uncomment/{{ $comment->id }}">&times;</a>
                                @endif
                                <h4 class="media-heading">
                                    <a href="/{{ $comment->user->username }}">
                                        {{ $comment->user->name }}
                                    </a>
                                    <small data-toggle="tooltip" data-placement="right" title="{{ $comment->datePublished() }}">{{ $comment->datePublishedDiff() }}</small>
                                </h4>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>