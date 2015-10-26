@extends('master')

@section('body')
<h1>Show Category Item</h1>
<p>Name : {{ $Category->name }}</p>
<p>Description : {{ $Category->description }}</p>
<p>
	List of Catalogs : 
	<ul>
	@forelse ($Category->Catalogs as $Catalog)
		<li>{{ $Catalog->name }}</li>
	@empty
		<li>No Catalog</li>
	@endforelse
	</ul>
</p>
<p>Last Updated : {{ $Category->updated_at->toDayDateTimeString() }}</p>
<p>
	<a href="{{ route('category.index') }}" title="Back to Categories"><button class="btn btn-primary "> Back to Categories
</button></a>
</p>
@stop