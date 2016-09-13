@extends('templates.user')

@section('title', 'Crear Consultor')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Crear <strong>Consultor</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::open(['route' => 'consultor.store', 'method' => 'POST']) !!}
        <div class="row">
            @include('persona.form')
            @include('consultor.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Crear Consultor', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection