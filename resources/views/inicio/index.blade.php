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
                <h2 class="intro-text text-center">Pagina
                    <strong>Inicio</strong>
                </h2>
                <hr>

                <p>Modificar contenido</p>
                <p>en la vista inicio/index.blade.php</p>

            </div>
        </div>
    </div>
@endsection