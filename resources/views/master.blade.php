<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Redemption System</title>
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
</head>
<body>
<div>
  <nav class="navbar-default">
      <div class="container">
        <div >
    
		@if (Auth::check())
		Welcome to my ZONE {{ Auth::user()->name }}! 
		<div  class="pull-right" > {{ Auth::user()->name }} <a href="{{ route('logout') }}"><button class="btn btn-primary "> Logout</button></a></div>
		@endif
	   </div> 
      </div>
    </nav>
   </div>
	@if (Auth::check())
	 <nav class="navbar-default">
	 <div class="container">
	<p style="background: #e3e3e3;padding:10px;">
	 
			[<a href="{{ route('category.index') }}" title="Categories">Categories</a>]
			[<a href="{{ route('catalog.index') }}" title="Catalogs">Catalogs</a>]
			[<a href="{{ route('cart.index') }}" title="Cart">Cart</a>]
			[<a href="{{ route('transaction.index') }}" title="transaction">Transaction</a>]
		</ul>
	</p>
	</div>
	</nav>
	@endif
	<div>
		@include('errors.alert')
	</div>
	 <div class="container">
	<div style='background:#eee;padding:10px;'>
		@yield('body')	
	</div>
	</div>

<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
<script src="//code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	$(document).on('click','.delete',function(e){
		e.preventDefault();
		var $url = $(this).attr('href');
		if($url != '' && $url != '#')
		{
			$.ajax({
				method: "DELETE",
				url: $url
			})
			.done(function( msg ) {
				location.reload();
			});
		}
	});

});
</script>
</html>