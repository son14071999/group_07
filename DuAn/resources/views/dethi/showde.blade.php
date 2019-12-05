@extends('index')
@section('content')
	<div class="container" style="background: #FFFFFF; min-height: 700px;">
		<p style="text-align: center;font-size: 40px; color: #2BF07A;">{{$de['tenDe']}}</p>
		{!! Form::label('email', 'Địa chỉ Email') !!}
		{!! Form::text("text", $value = null, $attributes = array()) !!}
		{!! Form::textarea("text", $value, $attributes = array()) !!}
		{!! Form::email("text", $value = null, $attributes = array()) !!}
		{!! Form::password("text") !!}
		{!! Form::file("text", $attributes = array()) !!}
	</div>
@endsection