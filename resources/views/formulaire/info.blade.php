@extends('template')
@section('contenu')
{!! Form::open (['url'=> 'form']) !!}
	{!! Form::label ('nom','entrer votre nom :')  !!}
	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
	
		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
						
	{!! Form::submit('Envoyer')!!}
	{!! Form::close() !!}

@stop