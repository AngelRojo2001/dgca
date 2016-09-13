@extends('templates.user')

@section('title', 'Crear CAEB')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Registro <strong>CAEB</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::open(['route' => 'caeb.store', 'method' => 'POST']) !!}
        <div class="row">
            @include('caeb.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Registrar CAEB', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection