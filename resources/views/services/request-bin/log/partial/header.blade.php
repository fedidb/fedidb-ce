<div class="card bg-primary text-white mb-3">
	<div class="card-body p-5">
		<p class="h1 mb-0">
			Log
			<span class="float-right">
				<a class="btn btn-outline-light" href="{{$bin->shortcodeUrl()}}">
					View Bin
					<i class="fas fa-chevron-right ml-3"></i>
				</a>
			</span>
		</p>
	</div>
</div>
<div class="py-3 mb-3">
	<ul class="nav nav-pills nav-fill">
		<li class="nav-item">
			<a class="nav-link font-weight-bold {{request()->is('*/object')?'active':''}}" href="{{$binlog['home']}}/object">
				<i class="fas fa-list mr-2"></i>Object
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link font-weight-bold {{request()->is('*/actor')?'active':''}}" href="{{$binlog['home']}}/actor">
				<i class="far fa-user mr-2"></i>Actor
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link font-weight-bold {{request()->is('*/headers')?'active':''}}" href="{{$binlog['home']}}/headers">
				<i class="fas fa-laptop-code mr-2"></i>Headers
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link font-weight-bold {{request()->is('*/debug')?'active':''}}" href="{{$binlog['home']}}/debug">
				<i class="fas fa-bug mr-2"></i>Debug
			</a>
		</li>
	</ul>
</div>