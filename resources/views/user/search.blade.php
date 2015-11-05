@extends('home')

@section('content')

	<div class="row">
		<div class="col-md-6">
			
			@if (count($results) == 0)
				<h2>No results.</h2>
			@else
				{{-- Search results are users only for now --}}
				<h2>Search results</h2>
				<div class="list-group">
					@foreach ($results as $user)
						@unless (Auth::user()->id == $user->id)
							<div class="list-group-item">
		                        <div class="media">
		                            <div class="media-left">
		                                <img class="profile-pic-sm media-object" src="{{ URL::asset('images/usm/' . $user->profile_pic) }}" alt="">
		                            </div>
		                            <div class="media-body">
		                                @unless (Auth::user()->isFollowing($user))
						                   <a type="button" class="close btn btn-pastiche" data-toggle="tooltip" data-placement="left" title="Follow {{ $user->name}}" href="{{ $user->username }}/follow"><i class="fa fa-plus"></i></a>
										@endif
		                                <h4 class="media-heading">
		                                    <a href="/{{ $user->username }}">
		                                        {{ $user->name }}
		                                    </a>
		                                </h4>
		                                <h5 class="media-body">
        									@if (count($user->followers) == 0)
												No Followers
											@elseif (count($user->followers) == 1)
												{{ count($user->followers) }} Follower
											@else
												{{ count($user->followers) }} Followers
											@endif
		                                </h5>
		                            </div>
		                        </div>
							</div>
						@endunless
					@endforeach
				</div>

			@endif
		</div>
	</div>

@stop