@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-10 offset-md-1">
			@include('services.request-bin.log.partial.header')
			<div class="card mb-5">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span class="lead">Headers</span>
					<span>
						<a class="small font-weight-bold text-muted" href="{{$binlog['home']}}/headers.json"><i class="far fa-file mr-2"></i>View Raw</a>
					</span>
				</div>
				<div class="card-body-flush">
					<pre id="payload" class="my-0 py-0 p-3 line-numbers linkable-line-numbers" style="word-break:break-all;white-space: pre-wrap;overflow-y: hidden;"><code class="language-json">{{$binlog['object']}}</code></pre>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('#payload').removeClass('p-3');
		$('head').append('<link rel="stylesheet" type="text/css" href="{{mix('css/prism.css')}}">');
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js" integrity="sha256-3teItwIfMuVB74Alnxw/y5HAZ2irOsCULFff3EgbtEs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/components/prism-json.min.js" integrity="sha256-pVgHctGgZmOFYStQ6BylpFTgUenv8Pn+bDg5ENFw8fg=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/plugins/line-numbers/prism-line-numbers.min.js" integrity="sha256-hep5s8952MqR7Y79JYfCXZD6vQjVHs7sOu/ZGrs1OEQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/plugins/line-highlight/prism-line-highlight.min.js" integrity="sha256-i1I0MEGBEKKEtBLlagkEPdef5OGDQEUdcjCPYo47a3Y=" crossorigin="anonymous"></script>
@endpush