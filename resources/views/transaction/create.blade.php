@extends('master')

@section('body')
<h2>Order No.<?php $t=time();echo $t ;?> </h2>

{!! Form::open(array('route'=>array('transaction.store'),'method'=>'post','name'=>'theform','files'=>true)) !!}
<?php 
	$alltotal=0;
	$item_num=0;
 ?>
@forelse ($Carts as $cart)
	
	<input type="hidden" name=<?php echo 'catalog_id'.$item_num?> value={!! $cart->catalog_id !!} >
	<input type="hidden" name=<?php echo 'price'.$item_num?> value={!!$cart->Catalog->price!!} >
	<input type="hidden" name=<?php echo 'quantity'.$item_num?> value={!!$cart->quantity !!} >
	<input type="hidden" name=<?php echo 'total_price'.$item_num?> value=<?php $total= $cart->Catalog->price*$cart->quantity;
	echo  $total;
	$alltotal+=$cart->Catalog->price*$cart->quantity;
	$item_num+=1;
	?> >

	@empty
		No Category
	@endforelse
	<input type="hidden" name="grand_total" value=<?php echo $alltotal?> >
	<input type="hidden" name="item_num" value=<?php echo $item_num ?> >
	<input type="hidden" name="user_id" value={!! $cart->user_id !!} >
	<input type="hidden" name="order_num" value=<?php echo $t ;?> >

	<h2>Payment:RM<?php echo number_format($alltotal,2)?></h2>
	

	<a href="{{ route('cart.index') }}"><button type="button"class="btn btn-primary" >back</button></a>
	<a href="{{ route('catalog.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">Pay Now</button></a>
	{{-- {!! Form::submit('Pay Now') !!} --}}
	
{!! Form::close() !!}
@stop