@extends('templates.user')

@section('title', 'Crear Funcionario')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Crear <strong>Funcionario</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::open(['route' => 'funcionario.store', 'method' => 'POST']) !!}
        <div class="row">
            @include('persona.form')
            @include('funcionario.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Crear Funcionario', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection