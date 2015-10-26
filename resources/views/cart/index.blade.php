@extends('master')

@section('body')
<h1>My Cart</h1>
<?php $f=true ?>
@if($cart_count != 0)
<table  width="70%">
	<tr>
		<td>
			<h3>Name</h3>
		</td>
		<td>
			<h3>Price</h3>
		</td>
		<td>
			<h3>Quantity</h3>
		</td>
		<td>
			<h3>Total</h3>
		</td>
		<td>
			<h3>Edit</h3>
		</td>
	</tr>
	@endif
<?php $alltotal=0; ?>
	@forelse ($Cart as $cart)
		<tr>
		<td>
			<a href="{{ route('catalog.show',array($cart->catalog_id)) }}"><strong>{{ $cart->Catalog->name }}</strong></a>
		</td>
		<td>
			<p>RM{{ number_format($cart->Catalog->price,2)}}</p>
		</td>
		<td>
			{{ $cart->quantity }}
		</td>
		<td>
			<p><?php $total= $cart->Catalog->price*$cart->quantity;
			echo "RM".number_format($total,2);
			$alltotal+=$cart->Catalog->price*$cart->quantity
			 ?></p>
		</td>
		<td>
			[<a href="{{ route('cart.edit',array($cart->id))}}"title="Edit">Edit</a>]
			[<a class="delete" href="{{ route('cart.destroy',array($cart->id)) }}" title="Delete">Delete</a>]

		</td>
	</tr>

	@empty
		No Category
		<?php $f=false ?>
	@endforelse
@if($cart_count != 0)
<tr>
		<td>
		
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			<p>RM<?php echo number_format($alltotal,2) ?></p>
		</td>
		<td>
		
		<a href="{{ route('transaction.create') }}" ><button class="btn btn-primary" >checkout</button></a>
		


		</td>
		</td>
	</tr>

</table>
@endif

@stop