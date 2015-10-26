@if (count($errors))
	<ol>
    @foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
    @endforeach
	</ol>
@endif

@if (Session::has('error'))
	{{ Session::get('error') }}
@endif

@if (Session::has('success'))
	{{ Session::get('success') }}
@endif