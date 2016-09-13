@extends('templates.user')

@section('title', 'Consultor')

@section('container')
    <h1 class="intro-text text-center">
       	Registro <strong>Consultor</strong>
    </h1>
    <hr>
    @include('alerts.success')
    {!! $consultores->render() !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>CI</th>
                    <th>RENCA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($consultores as $consultor)
                <tr>
                    <td>{{ $consultor->apellidos }}</td>
                    <td>{{ $consultor->nombres }}</td>
                    <td>{{ $consultor->ci }}</td>
                    <td>{{ $consultor->renca }}</td>
                    <td>
                        <a href="{{ route('consultor.edit', ['id' => $consultor->id]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('consultor.show', ['id' => $consultor->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>
        <a href="{{ route('consultor.create') }}" class="btn btn-default">Añadir</a>
    </p>
@endsection