<div id="postModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make a new post</h4>
            </div>
            <div class="modal-body">
                {{-- app.php in config has been modified for form. Be noted. --}}
                {{-- Create a post form --}}
                <form method="POST" action="/newpost" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        {{-- Refactor 'picture' to 'image' perhaps? --}}
                        <input type="file" name="picture" required="required" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="caption" required="required" class="form-control" placeholder="Caption">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>