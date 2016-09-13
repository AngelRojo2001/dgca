<div class="form-group col-lg-4">
    {!! Form::label('tipo_registro', 'Tipo de registro') !!}
    {!! Form::select('tipo_registro', $tipo_registro, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('fecha_registro', 'Fecha') !!}
    {!! Form::date('fecha_registro', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('usuario_id', 'Funcionario') !!}
    {!! Form::select('usuario_id', $usuarios, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('consultor_id', 'Consultor') !!}
    {!! Form::select('consultor_id', $consultores, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('archivado', 'Archivado') !!}
    {!! Form::select('archivado', $archivado, null, ['class' => 'form-control']) !!}
</div>