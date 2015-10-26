@extends('master')

@section('body')
<h1>New Category Item</h1>
<div>
{!! Form::open(array('route'=>array('category.store'),'method'=>'post','name'=>'theform','files'=>true)) !!}
<p>
{!! Form::label('name', 'Category Name') !!}
{!! Form::text('name', old('name')) !!}
</p>
<p>
{!! Form::label('description', 'Category Description') !!}
{!! Form::textarea('description', old('description')) !!}
</p>
<p>
<a href="{{ route('category.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">Save Item</button></a>

{{-- {!! Form::submit('Save Item') !!} --}}
</p>
{!! Form::close() !!}
</div>
@stop