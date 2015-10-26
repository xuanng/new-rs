@extends('master')

@section('body')
<h1>Transaction</h1>
@if($Count!=0)
<table  width="70%">
	<tr>
		<td>
			<h3>Date</h3>
		</td>
		<td>
			<h3>Item</h3>
		</td>
		<td>
			<h3>Total</h3>
		</td>
		<td>
			<h3>Order no</h3>
		</td>
		<td>
			
		</td>
		
	</tr>
@endif

@forelse ($TransactionHeads as $th)
	<tr>
		<td>
			{{ $th->created_at}}
		</td>
		<td>
			{{ $th->item_num }}
		</td>
		<td>
			{{$th->grand_total }}
		</td>
		<td>
			{{$th->order_num }}
		</td>
		<td>
			[<a href="{{ route('transaction.show',$th->id) }}">show</a>]
		</td>
		
	</tr>

@empty
		No transaction
	@endforelse

	</table>
@stop