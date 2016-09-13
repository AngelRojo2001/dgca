<div class="form-group col-lg-4">
    {!! Form::label('login', 'Login') !!}
    {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Ingrese login']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('cargo', 'Cargo') !!}
    {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cargo']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('tipo', 'Tipo') !!}
    {!! Form::select('tipo', $tipo, null, ['class' => 'form-control']) !!}
</div>