@extends('templates.user')

@section('title', 'Editar RAI')

@section('container')
	<div class="row">
	    <div class="box">
	        <div class="col-lg-12">
	            <hr>
	            <h2 class="intro-text text-center">Editar
	                <strong>Unidad Industrial</strong>
	            </h2>
                <hr>
                {!! Form::model($ui, ['url' => ['registro', $ui->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            {!! Form::label('codigo_rai', 'Código RAI') !!}
                            {!! Form::text('codigo_rai', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número RAI', 'disabled' => 'disabled']) !!}
                        </div>
                        @include('registro.forms.form')
                        <div class="form-group col-lg-12">
                            {!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection