@extends('templates.user')

@section('title', 'Business Casual - Start Bootstrap Theme')

@section('container')
	<h1 class="intro-text text-center">
       	DETALLE <strong>UNIDAD INDUSTRIAL</strong>
    </h1>
    <hr>
    @include('alerts.success')
    <div class="row">
        <div class="box">
            <div class="form-group col-lg-4">
                <strong>Código RAI</strong><br>
                {{ $ui->codigo_rai }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Unidad Industrial</strong><br>
                {{ $ui->nombre_ui }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Razón Social</strong><br>
                {{ $ui->razon_social }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Dirección</strong><br>
                {{ $ui->direccion_ui }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Distrito</strong><br>
                {{ $ui->distrito_ui }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Representante Legal</strong><br>
                {{ $ui->apellidos }} {{ $ui->nombres }}
            </div>
            <div class="form-group col-lg-4">
                <strong>C.I.</strong><br>
                {{ $ui->ci }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Email</strong><br>
                {{ $ui->email }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Teléfono</strong><br>
                {{ $ui->telefono }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Coordenada X</strong><br>
                {{ $ui->coord_x }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Coordenada Y</strong><br>
                {{ $ui->coord_y }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Categoría</strong><br>
                {{ $ui->categoria }}
            </div>
            <div class="form-group col-lg-4">
                <strong>Fase</strong><br>
                {{ $ui->fase }}
            </div>
            <div class="form-group col-lg-4">
                <a href="{{ route('registro.edit', ['id' => $ui->id]) }}" class="btn btn-success">Editar</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>CAEB</th>
                    <th>Categoría</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($caebs as $caeb)
                <tr>
                    <td>{{ $caeb->codigo }} - {{ $caeb->descripcion }}</td>
                    <td>{{ $caeb->categoria }}</td>
                    <td>
                        <a href="{{ url('caebui/eliminar', ['id' => $caeb->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('caebui', ['id' => $ui->id]) }}" class="btn btn-success">Añadir Caeb</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>Tipo de registro</th>
                    <th>Fecha de registro</th>
                    <th>Funcionario</th>
                    <th>Consultor</th>
                    <th>Archivado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($rais as $rai)
                <tr>
                    <td>{{ $rai->tipo_registro }}</td>
                    <td>{{ $rai->fecha_registro }}</td>
                    <td>{{ $rai->apellidosF }} {{ $rai->nombresF }}</td>
                    <td>{{ $rai->apellidosC }} {{ $rai->nombresC }}</td>
                    <td>{{ $rai->archivado }}</td>
                    <td>
                        <a href="{{ url('rai/editar', ['id' => $rai->id]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ url('rai/eliminar', ['id' => $rai->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('rai', ['id' => $ui->id]) }}" class="btn btn-success">Añadir RAI</a>
    </div>
@endsection