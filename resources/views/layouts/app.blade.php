<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FediDB - ActivityPub Tools for Developers</title>
	<link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
	{{-- <script src="https://kit.fontawesome.com/53d769e421.js" crossorigin="anonymous"></script> --}}
	{{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet"> --}}
	@stack('styles')
</head>
<body>
	@if (session('status'))
	<div class="alert alert-primary px-3 h6 text-center">
		{{ session('status') }}
	</div>
	@endif
	@include('layouts.nav')
	<div class="mt-5" id="app">
		@yield('content')
	</div>
	{{-- <footer>
		<div class="container py-5">
			<p class="text-center text-muted"><a class="text-dark font-weight-bold" href="{{config('app.url')}}">FediDB</a> by <a href="https://pixelfed.org" class="text-muted font-weight-bold">Pixelfed</a></p>
		</div>
	</footer> --}}
	<script type="text/javascript" src="{{mix('js/manifest.js')}}"></script>
	<script type="text/javascript" src="{{mix('js/vendor.js')}}"></script>
	<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
	@stack('scripts')
</body>
</html>