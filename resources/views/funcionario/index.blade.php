@extends('templates.user')

@section('title', 'Funcionario')

@section('container')
    <h1 class="intro-text text-center">
       	Registro <strong>Funcionario</strong>
    </h1>
    <hr>
    @include('alerts.success')
    {!! $funcionarios->render() !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>LOGIN</th>
                    <th>CI</th>
                    <th>CARGO</th>
                    <th>TIPO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->apellidos }}</td>
                    <td>{{ $funcionario->nombres }}</td>
                    <td>{{ $funcionario->login }}</td>
                    <td>{{ $funcionario->ci }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->tipo }}</td>
                    <td>
                        <a href="{{ route('funcionario.edit', ['id' => $funcionario->id]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('funcionario.show', ['id' => $funcionario->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>
        <a href="{{ route('funcionario.create') }}" class="btn btn-default">Añadir</a>
    </p>
@endsection