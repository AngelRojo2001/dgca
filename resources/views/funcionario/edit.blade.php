@extends('templates.user')

@section('title', 'Editar Funcionario')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Editar <strong>Funcionario</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::model($funcionario, ['route' => ['funcionario.update', 'id' => $funcionario->id], 'method' => 'PUT']) !!}
        <div class="row">
            @include('persona.form')
            @include('funcionario.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Editar Funcionario', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection