@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 lh-1 mb-3 fw-bolder">Test your <span class="text-primary">ActivityPub</span> applications, easily.</h1>
        <p class="col-lg-10 fs-4">Use our <span class="fw-bold">Request Bin</span> tool to inspect and debug requests from a unique mock actor account.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
      	<p class="h4 text-center mb-3">Create New Request Bin</p>

        @if (session('error'))
        <div class="alert alert-danger fw-bold">
          {{ session('error') }}
        </div>
        @endif

        <form method="post" action="/s/request-bin" class="p-4 p-md-5 border rounded-3 bg-light">
          @csrf
          <div class="form-floating mb-3">
			<input type="text" class="form-control" name="name" id="binName" placeholder="Untitled bin">
            <label for="binName">Name</label>
          </div>
          <div class="form-floating mb-3">
            <textarea type="text" class="form-control" id="binDescription" name="description" placeholder="Optional description" rows="4"></textarea>
            <label for="binDescription">Description</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary text-light" type="submit">Create Request Bin</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Create Request Bin, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
</div>
@include('layouts.footer')
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert-danger').fadeOut();
    }, 5000);
  });
</script>
@endpush