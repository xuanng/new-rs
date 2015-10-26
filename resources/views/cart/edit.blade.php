@extends('master')

@section('body')
<h1>Edit Cart</h1>
<div>
{!! Form::open(array('route'=>array('cart.update',$id),'method'=>'put','name'=>'theform','files'=>true)) !!}
<p>
Name:
{{  $Cart->Catalog->name}}
</p>
<p>
Price:RM{{number_format( $Cart->Catalog->price,2)}}
</p>
<p>
 Quantity:<input type="number" name="quantity" min='1' value={{ $Cart->quantity }}>
</p>
<p>
	
</p>
<p>
<a href="{{ route('cart.index') }}"><button type="button"class="btn btn-primary"> back</button></a>&nbsp
<a href="{{ route('cart.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">Save Itemt</button></a>

{{-- {!! Form::submit('Save Item') !!} --}}
</p>
{!! Form::close() !!}

{{-- <a class="delete1" href="{{ route('cart.destroy',array($Cart->id)) }}" title="Delete"><button type="button"> Delete</button></a> --}}

</div>
@stop