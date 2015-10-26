@extends('master')

@section('body')
<h1>Category</h1>
<div>
	<a href="{{ route('category.create') }}" title="Create New">Create New</a>
</div>
<div>
	@forelse ($Categories as $Category)
		<ul>
			<li>
			<a href="{{ route('category.show',array($Category->id)) }}"><strong>{{ $Category->name }}</strong> (# of Catalogs : {{ $Category->Catalogs->count() }}) - (</a> 
			[<a href="{{ route('category.edit',array($Category->id)) }}" title="Edit">Edit</a>] 
			[<a class="delete" href="{{ route('category.destroy',array($Category->id)) }}" title="Delete">Delete</a>]
			</li>
		</ul>
	@empty
		No Category
	@endforelse
</div>
<div>
	{!! str_replace('/?', '?', $Categories->appends(Input::all())->render()) !!}
</div>
@stop