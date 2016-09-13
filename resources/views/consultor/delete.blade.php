@extends('templates.user')

@section('title', 'Eliminar Consultor')

@section('container')
    <h1 class="intro-text text-center">
       	Eliminar <strong>Consultor</strong>
    </h1>
    <hr>
    <p>¿Realmente desea eliminar Consultor?</p>
    <ul>
        <li><strong>Apellidos:</strong> {{ $consultor->apellidos }}</li>
        <li><strong>Nombres:</strong> {{ $consultor->nombres }}</li>
        <li><strong>CI:</strong> {{ $consultor->ci }}</li>
        <li><strong>Cargo:</strong> {{ $consultor->renca }}</li>
    </ul>
    {!! Form::open(['route'=>['consultor.destroy', $consultor->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection