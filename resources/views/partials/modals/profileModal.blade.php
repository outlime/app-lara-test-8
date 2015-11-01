<div id="profileFollowerModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-commonhead">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Followers</h4>
            </div>

            <div class="modal-body">
				<div class="list-group">
					@if (count($user->followers) == 0)
						<p class="list-group-item">{{ $user->name }} doesn't have any followers.</p>
					@endif
					@foreach ($user->followers as $follower)
						<a href="{{ $follower->username }}" class="list-group-item">
							<div class="media">
			                    <div class="media-left">
		                            <img class="media-object profile-pic-sm" src="{{ URL::asset('images/usm/' . $follower->profile_pic) }}" alt="">
			                    </div>
			                    <div class="media-body">
			                        <h4 class="media-heading">{{ $follower->name }}</h4>
			                        <h5>{{ count($follower->followers) }} Followers</h5>
			                    </div>
			                </div>
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
            	<div class="list-group">
					@if (count($user->following) == 0)
						<p class="list-group-item">{{ $user->name }} isn't following anybody.</p>
					@endif
					@foreach ($user->following as $following)
						<a href="{{ $following->username }}" class="list-group-item">
							<div class="media">
			                    <div class="media-left">
		                            <img class="media-object profile-pic-sm" src="{{ URL::asset('images/usm/' . $following->profile_pic) }}" alt="">
			                    </div>
			                    <div class="media-body">
			                        <h4 class="media-heading">{{ $following->name }}</h4>
			                        <h5>{{ count($following->followers) }} Followers</h5>
			                    </div>
			                </div>
						</a>
					@endforeach
				</div>
            </div>
        </div>
    </div>
</div>
