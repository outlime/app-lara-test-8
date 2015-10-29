<div id="postModal{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
                {{-- Modal header (caption) --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                {{-- Modal body (picture) --}}
                <img src="{{ URL::asset('uploads/posts') }}/{{ $post->picture }}" class="img-thumbnail post-img-modal center-block" alt="{{ $post->caption }}" data-holder-rendered="true">
            </div>
            <div class="modal-footer">
                <h4 class="modal-title  text-left">
                    <ul class="list-inline">
                        <li><i class="fa fa-heart"></i> 4</li>
                        <li><i class="fa fa-comment"></i> 3</li>
                        <li><i class="fa fa-calendar"></i> 10/25/15</li>
                    </ul>
                </h4>
            </div>
        </div>
    </div>
</div>