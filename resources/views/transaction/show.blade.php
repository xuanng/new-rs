@extends('master')

@section('body')
<h1>Show Transaction Detail</h1>

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
			
		</td>
	</tr>
<?php $alltotal=0; ?>
	@forelse ($TransactionDetails as $td)
	
		<tr>
		<td>
			<a href="{{ route('catalog.show',array($td->catalog_id)) }}"><strong>{{ $td->Catalog->name }}</strong></a>
		</td>
		<td>
			<p>RM{{number_format($td->price)}}</p>
		</td>
		<td>
			{{ $td->quantity }}
		</td>
		<td>
			 <?php $alltotal+=$td->total_price  ?>{{ $td->total_price }}
		</td>
	</tr>
	@empty
		No Category
	@endforelse
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

		</td>
		</td>
	</tr>

</table> 

<a href="{{ route('transaction.index') }}"><button class="btn btn-primary ">back</button></a>
@stop