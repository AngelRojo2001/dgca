@extends('templates.user')

@section('title', 'Eliminar Funcionario')

@section('container')
    <h1 class="intro-text text-center">
       	Eliminar <strong>Funcionario</strong>
    </h1>
    <hr>
    <p>¿Realmente desea eliminar Funcionario?</p>
    <ul>
        <li><strong>Apellidos:</strong> {{ $funcionario->apellidos }}</li>
        <li><strong>Nombres:</strong> {{ $funcionario->nombres }}</li>
        <li><strong>CI:</strong> {{ $funcionario->ci }}</li>
        <li><strong>Cargo:</strong> {{ $funcionario->cargo }}</li>
    </ul>
    {!! Form::open(['route'=>['funcionario.destroy', $funcionario->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection