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