@extends('templates.user')

@section('title', 'Editar Consultor')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Editar <strong>Consultor</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::model($consultor, ['route' => ['consultor.update', 'id' => $consultor->id], 'method' => 'PUT']) !!}
        <div class="row">
            @include('persona.form')
            @include('consultor.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Editar Consultor', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection