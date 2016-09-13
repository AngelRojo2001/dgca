<div class="table-responsive">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>CODIGO RAI</th>
                <th>UNIDAD INDUSTRIAL</th>
                <th>REPRESENTANTE LEGAL</th>
                <th>CATEGORIA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($uis as $ui)
            <tr>
                <td>{{ $ui->codigo_rai }}</td>
                <td>{{ $ui->nombre_ui }}</td>
                <td>{{ $ui->apellidos }} {{ $ui->nombres }}</td>
                <td>{{ $ui->categoria }}</td>
                <td>
                    <a href="{{ route('registro.show', ['id' => $ui->id]) }}" class="btn btn-success btn-sm">Detalle</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>