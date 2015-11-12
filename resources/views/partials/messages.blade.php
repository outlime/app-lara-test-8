@if (Session::has('flash_success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('flash_success') }}
	</div>
@endif

@if (Session::has('flash_warning'))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('flash_warning') }}
	</div>
@endif

@if (Session::has('flash_danger'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('flash_danger') }}
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif