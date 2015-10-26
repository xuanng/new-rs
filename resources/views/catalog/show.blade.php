@extends('master')

@section('body')
<h1>Show Catalog Item</h1>
<p>Name : {{ $Catalog->name }}</p>
<p>Category : {{ $Catalog->category }}</p>
<p>Category Description : {{ $Catalog->Category->description }}</p>
<p>Price : RM {{ number_format($Catalog->price,2) }}</p>
<p>Last Updated : {{ $Catalog->updated_at->toDayDateTimeString() }}</p>
<div>
{!! Form::open(array('route'=>array('cart.store'),'method'=>'post','name'=>'theform','files'=>true)) !!}
<p>
<input type="hidden" name="name" value={!! $Catalog->name !!} >
</p>
<p>
<input type="hidden" name="price" value={!! $Catalog->price !!} >
</p>
<p>
<input type="hidden" name="user_id" value={!!Auth::user()->id !!} >
</p>
<p>
<input type="hidden" name="catalog_id" value={!!$Catalog->id !!} >
</p>
<p>
<a href="{{ route('catalog.index') }}" title="Back to Catalogs"><button type="button" class="btn btn-primary "> Back to Catalogs</button></a>
<a href="{{ route('catalog.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">add to cart</button></a>

</p>
{!! Form::close() !!}
</div>
	
</p>
@stop