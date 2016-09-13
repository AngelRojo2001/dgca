@extends('templates.user')

@section('title', 'Eliminar CAEB')

@section('container')
    <h1 class="intro-text text-center">
       	Eliminar <strong>CAEB</strong>
    </h1>
    <hr>
    <p>¿Realmente desea eliminar CAEB?</p>
    <ul>
        <li><strong>Código:</strong> {{ $caeb->codigo }}</li>
        <li><strong>Descripción:</strong> {{ $caeb->descripcion }}</li>
    </ul>
    {!! Form::open(['route'=>['caeb.destroy', $caeb->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection