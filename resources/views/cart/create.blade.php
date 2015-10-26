@extends('master')

@section('body')
<h1>My Cart</h1>
<div>
{!! Form::open(array('route'=>array('cart.store',$catalog_id),'method'=>'post','name'=>'theform','files'=>true)) !!}
<p>
{!! Form::label('name', 'Item Name') !!}
{!! Form::text('name', old('name',$Catalog->name)) !!}
</p>
<p>
{!! Form::label('price', 'Item Price') !!}
{!! Form::text('price', old('name',$Catalog->price)) !!}
</p>
<p>
{!! Form::label('user_id', 'Item User_id') !!}
{!! Form::number('user_id', old('user_id',Auth::user()->id)) !!}
</p>
<p>
{!! Form::submit('Save Item') !!}
</p>
{!! Form::close() !!}
</div>
@stop