<div id="postModal{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- Modal header (caption) --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ $post->caption }}</h4>
            </div>
            <div class="modal-body">
                {{-- Modal body (picture) --}}
                <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="img-thumbnail" alt="{{ $post->caption }}" data-holder-rendered="true">
            </div>
        </div>
    </div>
</div>