@extends('master')

@section('body')
<h1>Update Category Item</h1>
<div>
{!! Form::open(array('route'=>array('category.update',$id),'method'=>'put','name'=>'theform','files'=>true)) !!}
<p>
{!! Form::label('name', 'Category Name') !!}
{!! Form::text('name', old('name',$Category->name)) !!}
</p>
<p>
{!! Form::label('description', 'Category Description') !!}
{!! Form::textarea('description', old('description',$Category->description)) !!}
</p>
<a href="{{ route('category.index') }}" title="add to cart"><button type="submit" class="btn btn-primary ">Save Itemt</button></a>

{{-- {!! Form::submit('Save Item') !!} --}}
</p>
{!! Form::close() !!}
</div>
@stop