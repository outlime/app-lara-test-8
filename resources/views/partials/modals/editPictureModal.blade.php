<div id="profileEditPicture" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit Profile Picture</h4>
            </div>

            <div class="modal-body">
            	<div class="row">
            		
            		<div class="col-md-12">
		            	<form method="POST" action="changeprofilepic" enctype="multipart/form-data">
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                    <h4>Upload photo</h4>
		                    <div class="form-group">
		                        <input type="file" name="picture" required="required" accept="image/*">
		                    </div>
		                    <hr>
		                    <div class="form-group">
		                        <button type="submit" class="btn btn-pastiche">Change</button>
		                    </div>
		                </form>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>