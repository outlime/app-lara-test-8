<div id="commentModal{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Comments</h4>
            </div>
            <div class="modal-body">
               {{-- Comment form --}}
                <form method="POST" action="/{{ $user->username }}/posts/{{ $post->id }}/comment">
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
                <div class="list-group">
                    @foreach ($post->comments as $comment)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-11">
                                    <a href="/{{ $comment->user->username }}" class="">
                                        {{ $comment->user->name }}
                                    </a>
                                    {{ $comment->comment }}
                                </div>
                                <div class="col-md-1">
                                    @if (Auth::user()->id == $comment->user->id)
                                        <a type="button" class="close" href="{{ $user->username }}/posts/{{ $post->id }}/uncomment/{{ $comment->id }}">&times;</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>