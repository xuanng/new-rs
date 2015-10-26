@extends('master')

@section('body')
<h1>New Catalog Item</h1>
<div>
{!! Form::open(array('route'=>array('catalog.store'),'method'=>'post','name'=>'theform','files'=>true)) !!}
<p>
{!! Form::label('name', 'Item Name') !!}
{!! Form::text('name', old('name')) !!}
</p>
<p>
{!! Form::label('price', 'Item Price') !!}
{!! Form::text('price', old('price')) !!}
</p>
<p>
{!! Form::label('category', 'Item Category') !!}
{!! Form::select('category', $categories, old('category')) !!}
</p>
<p>
{!! Form::submit('Save Item') !!}
</p>
{!! Form::close() !!}
</div>
@stop