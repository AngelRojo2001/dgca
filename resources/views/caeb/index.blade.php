@extends('templates.user')

@section('title', 'CAEB')

@section('container')
    <h1 class="intro-text text-center">
       	Registro <strong>CAEB</strong>
    </h1>
    <hr>
    @include('alerts.success')
    {!! $caebs->render() !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>CÓDIGO</th>
                    <th>DESCRIPCIÓN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($caebs as $caeb)
                <tr>
                    <td>{{ $caeb->codigo }}</td>
                    <td>{{ $caeb->descripcion }}</td>
                    <td>
                        <a href="{{ route('caeb.edit', ['id' => $caeb->id]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('caeb.show', ['id' => $caeb->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>
        <a href="{{ route('caeb.create') }}" class="btn btn-default">Añadir</a>
    </p>
@endsection