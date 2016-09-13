@extends('templates.user')

@section('title', 'Editar RAI')

@section('container')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                @include('alerts.request')
                <hr>
                <h2 class="intro-text text-center">Editar
                    <strong>RAI</strong>
                </h2>
                <hr>
                {!! Form::model($rai, ['url' => ['rai', 'id' => $rai->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        @include('rai.rai')
                    </div>
                    <hr>
                    <div class="form-group col-lg-12">
                        {!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection