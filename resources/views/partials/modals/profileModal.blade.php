<div id="profileFollowerModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Followers</h4>
            </div>

            <div class="modal-body">
				<div class="list-group">
					@foreach ($user->followers as $follower)
						<a href="{{ $follower->username }}" class="list-group-item">
							<h4>{{ $follower->name }}</h4>
						</a>
					@endforeach
				</div>
            </div>
        </div>
    </div>
</div>

<div id="profileFollowingModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Following</h4>
            </div>

            <div class="modal-body">
            	
            </div>
        </div>
    </div>
</div>

