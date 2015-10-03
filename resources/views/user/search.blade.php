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
								<div class="row">
									<div class="col-md-10">
										<h4><a href="{{ $user->username }}">{{ $user->name }}</a></h4>
									</div>	

									<div class="col-md-2">
										<p>
											@unless (Auth::user()->isFollowing($user))
												<a class="btn btn-xs btn-primary" href="{{ $user->username }}/follow">
													<i class="fa fa-plus"></i> Follow
												</a>
											@endif
										</p>
									</div>
								</div>

								<p class="list-group-item-text">
									@if (count($user->followers) == 0)
										No Followers
									@elseif (count($user->followers) == 1)
										{{ count($user->followers) }} Follower
									@else
										{{ count($user->followers) }} Followers
									@endif
								</p>
							</div>
						@endunless
					@endforeach
				</div>

			@endif
		</div>
	</div>

@stop