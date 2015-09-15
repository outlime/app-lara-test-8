@extends('home')

@section('content')

	<div class="row">
		<div class="col-md-6">
			
			@if (count($results) == 0)
				<h2>No results.</h2>
			@else
				<h2>Search results</h2>
				<div class="list-group">
					{{-- Result is user for now --}}
					@foreach ($results as $user)
						@unless (Auth::user()->id == $user->id)
							<a href="/{{ $user->username}}" class="list-group-item">
								<h4>{{ $user->name }}</h4>
								<p class="list-group-item-text">
									@if (count($user->followers) == 0)
										No Followers
									@elseif (count($user->followers) == 1)
										{{ count($user->followers) }} Follower
									@else
										{{ count($user->followers) }} Followers
									@endif
								</p>
							</a>
						@endunless
					@endforeach
				</div>
			@endif

		</div>
	</div>

@stop