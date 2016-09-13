@extends('templates.user')

@section('title', 'Business Casual - Start Bootstrap Theme')

@section('container')
	<h1 class="intro-text text-center">
       	Registro <strong>ui</strong>
    </h1>
    <hr>
    @include('alerts.success')
    @include('registro.lista')
    <p>
        <a href="{{ route('registro.create') }}" class="btn btn-default">Añadir</a>
    </p>
@endsection