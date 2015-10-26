<fieldset>
	<legend>api/login</legend>
	{!! Form::open(array('route'=>'api::login')) !!}
	{!! Form::textarea('data',json_encode(array(
		'name' => 'user wang',
		'password' => 'ABC123abc',
	))) !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!}
</fieldset>

<fieldset>
	<legend>api/cart</legend>
	{!! Form::open(array('route'=>'api::cart')) !!}
	{!! Form::textarea('data',json_encode(array(
		'name' => 'user wang',
		'password' => 'ABC123abc',
	))) !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!}
</fieldset>
<fieldset>
	<legend>api/catalog</legend>
	{!! Form::open(array('route'=>'api::catalog')) !!}
	{!! Form::textarea('data',json_encode(array(
		'name' => 'user wang',
		'password' => 'ABC123abc',
	))) !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!}
</fieldset>
<fieldset>
	<legend>api/transaction</legend>
	{!! Form::open(array('route'=>'api::transaction')) !!}
	{!! Form::textarea('data',json_encode(array(
		'name' => 'user wang',
		'password' => 'ABC123abc',
	))) !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!}
</fieldset>