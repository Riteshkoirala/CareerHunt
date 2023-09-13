@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	@foreach ($errors->all() as $error)
	<div>{{ $error}}</div>
	@endforeach
	<button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if(Session::has('success'))
<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
	{{ Session::get('success') }}
	<button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<script>
	setTimeout(function() {
	  $('#success-alert').alert('close');
	}, 5000);
  </script>
@endif

@if(Session::has('error'))
<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ Session::get('error') }}
	<button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<script>
	setTimeout(function() {
	  $('#error-alert').alert('close');
	}, 5000);
  </script>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	{{ Session::get('warning') }}
	<button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif