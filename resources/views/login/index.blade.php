@extends('master')

@section('body')
<h1>
	{{ 'Login Page' }} 
	{{ Session::get('name', '') }}
</h1>
{!! Form::open(array('route' => array('login'),'method'=>'post')) !!}
	<p>
		{!! Form::label('name', 'User Name') !!}
		{!! Form::text('name', '') !!}
	</p>
	<p>
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password') !!}
	</p>
	<p>
		{!! Form::submit('Login') !!}
	</p>
{!! Form::close() !!}
@stop