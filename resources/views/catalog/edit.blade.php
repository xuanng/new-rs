@extends('master')

@section('body')
<h1>Update Catalog Item</h1>
<div>
{!! Form::open(array('route'=>array('catalog.update',$catalog_id),'method'=>'put','name'=>'theform','files'=>true)) !!}
<p>
{!! Form::label('name', 'Item Name') !!}
{!! Form::text('name', old('name',$Catalog->name)) !!}
</p>
<p>
{!! Form::label('price', 'Item Price') !!}
{!! Form::text('price', old('price',$Catalog->price)) !!}
</p>
<p>
{!! Form::label('category', 'Item Category') !!}
{!! Form::select('category', $categories, old('category',$Catalog->category)) !!}
</p>
<p>
<a href="{{ route('catalog.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">Save Itemt</button></a>

{{-- {!! Form::submit('Save Item') !!} --}}
</p>
{!! Form::close() !!}
</div>
@stop