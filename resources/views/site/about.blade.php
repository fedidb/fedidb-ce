@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3 text-center bg-primary text-white p-5" style="border-radius: 0; border-top-left-radius: 10px; border-top-right-radius: 10px;">
			<p class="display-4 font-weight-bold mb-0">About</p>
		</div>
		<div class="col-12 col-md-6 offset-md-3 px-0">
			<div class="card card-body" style="border-radius: 0; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

				<div class="mt-3">
					<p class="lead">
						Developing an ActivityPub implementation can be difficult, we're here to help.
					</p>
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
</div>
@endsection