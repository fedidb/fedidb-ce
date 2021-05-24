<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
	<div class="container">
		<span class="navbar-brand mb-0 h1 mr-0">
			<a href="/" class="text-decoration-none text-dark">FediDB</a>
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item {{request()->is('/')?'active':''}} mr-3 font-weight-bold">
					<a class="nav-link" href="/">DevTools</a>
				</li>
			</ul>
		</div>
	</div>
</nav>