@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-10 offset-md-1">
			@include('services.request-bin.log.partial.header')
			
			<div class="list-group-item">
				<p class="mb-0 d-flex align-items-center justify-content-between">
					<span>
						<span class="small mr-2 font-weight-bold">{{$log->method}}</span>
						<span class="text-success mr-4 text-monospace">/inbox</span>
						<span class="lead mr-2">{{$log->verb}}</span>
					</span>
					<span class="">
						<span class="font-weight-bold text-muted">
							{{$log->created_at->diffForHumans()}}
						</span>
					</span>
				</p>
			</div>
		</div>
	</div>
	@endsection

	@push('scripts')

	@endpush
