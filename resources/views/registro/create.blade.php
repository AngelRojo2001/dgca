@extends('templates.user')

@section('title', 'Registrar RAI')

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#btn_agregar').click(function() {
                //$('#agregar').append('<div><div class="form-group col-lg-8" id="caeb"><select class="form-control" name="caeb[]">@foreach($caebs as $caeb) <option value="{{ $caeb->id }}">{{$caeb->codigo}} - {{ $caeb->descripcion }}</option> @endforeach</select></div><div class="form-group col-lg-4"><select class="form-control" name="categoriaCaeb[]">@foreach($categoria as $id => $valor) <option value="{{ $id }}">{{ $valor }}</option> @endforeach </select><button id="eliminaCaeb">Eliminar</button></div></div>');
                $('#agregar').append('<div><div class="form-group col-lg-8" id="caeb"><select class="form-control" name="caeb[]">@foreach($caebs as $caeb) <option value="{{ $caeb->id }}">{{$caeb->codigo}} - {{ $caeb->descripcion }}</option> @endforeach</select></div><div class="form-group col-lg-2">{!! Form::select("categoriaCaeb[]", $categoria, null, ["class" => "form-control"]) !!}</div><div class="form-group col-lg-2"><button id="eliminaCaeb" class="btn btn-default">Eliminar</button></div></div>');
            });
            $('body').on('click', '#eliminaCaeb', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection

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
                {!! Form::open(['url' => 'registro', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            {!! Form::label('codigo_rai', 'Código RAI') !!}
                            {!! Form::text('codigo_rai', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número RAI']) !!}
                        </div>
                        @include('registro.forms.form')
                        <hr>
                        @include('registro.forms.caeb')
                        <div id="agregar"></div>
                    </div>
                    <hr>
                    @include('registro.forms.rai')
                    <div class="form-group col-lg-12">
                        {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection