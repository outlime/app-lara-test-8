<div id="createPostModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
                <button type="button" class="close modal-commonhead" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make a new post</h4>
            </div>
            <div class="modal-body">
                {{-- Create a post form --}}
                <form method="POST" action="/newpost" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="file" name="picture" required="required" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="text" name="caption" required="required" class="form-control" placeholder="Caption">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" id="createPostButton" data-loading-text="Posting..." class="btn btn-pastiche">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>