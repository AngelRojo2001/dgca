@extends('templates.user')

@section('title', 'Editar CAEB')

@section('container')
	<hr>
    <h2 class="intro-text text-center">
       	Editar <strong>CAEB</strong>
    </h2>
    <hr>
    @include('alerts.request')
    {!! Form::model($caeb, ['route' => ['caeb.update', 'id' => $caeb->id], 'method' => 'PUT']) !!}
        <div class="row">
            @include('caeb.forms.form')
            <div class="form-group col-lg-12">
                {!! Form::submit('Editar CAEB', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection