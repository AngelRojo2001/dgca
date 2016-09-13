@extends('templates.user')

@section('title', 'Registrar RAI')

@section('container')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                @include('alerts.request')
                <hr>
                <h2 class="intro-text text-center">Registro
                    <strong>RAI</strong>
                </h2>
                <hr>
                {!! Form::open(['url' => 'rai', 'method' => 'POST']) !!}
                    <div class="row">
                        @include('rai.rai')
                    </div>
                    <hr>
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="ui_id" value="{{ $ui_id }}">
                        {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection