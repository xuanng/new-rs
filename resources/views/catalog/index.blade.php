@extends('master')

@section('body')
<h1>Catalog</h1>
<div>
	<a href="{{ route('catalog.create') }}" title="Create New">Create New</a>
</div>
<div>
	@forelse ($Catalogs as $Catalog)
		<ul>
			<li>
			[{{ $Catalog->category }}] 
			<a href="{{ route('catalog.show',array($Catalog->id)) }}"><strong>{{ $Catalog->name }}</strong> <em>RM {{ $Catalog->price }}</em></a> 
			[<a href="{{ route('catalog.edit',array($Catalog->id)) }}" title="Edit">Edit</a>] 
			[<a class="delete" href="{{ route('catalog.destroy',array($Catalog->id)) }}" title="Delete">Delete</a>]
			</li>
		</ul>
	@empty
		No Catalog
	@endforelse
</div>
<div>
	{!! str_replace('/?', '?', $Catalogs->appends(Input::all())->render()) !!}
</div>
@stop