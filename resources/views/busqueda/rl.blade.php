@extends('templates.user')

@section('title', 'Buscar Representante Legal')

@section('script')
    <script type="text/javascript">
        $(function() {
            $("#btn").click(function() {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    url: $('#form1').attr('action'),
                    data: $('#form1').serialize(),
                    success: llegadaDatos,
                    error: problemas
                });
                return false;
            });
        });

        function llegadaDatos(datos) {
            $('#mostrar').html(datos);
        }

        function problemas() {
            $('#mostrar').text('No se encontraron coincidencias');
        }
    </script>
@endsection

@section('container')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                @include('alerts.request')
                <hr>
                <h2 class="intro-text text-center">Buscar
                    <strong>Representante Legal</strong>
                </h2>
                <hr>
                {!! Form::open(['url' => 'busqueda/rl', 'id' => 'form1', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="form-group col-lg-12">
                            {!! Form::label('rl', 'Representante Legal') !!}
                            {!! Form::text('rl', null, ['class' => 'form-control', 'placeholder' => 'Apellidos o Nombres']) !!}
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary', 'id' => 'btn']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box">
            <div id="mostrar"></div>
        </div>
    </div>
@endsection