<div class="form-group col-lg-4">
    {!! Form::label('nombre_ui', 'Nombre Unidad Industrial') !!}
    {!! Form::text('nombre_ui', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Unidad Industrial']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('razon_social', 'Razón Social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Razón Social']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('direccion_ui', 'Dirección') !!}
    {!! Form::text('direccion_ui', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Dirección']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('distrito_ui', 'Distrito') !!}
    {!! Form::select('distrito_ui', $distrito, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('rlegal', 'Representante Legal') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('ci', 'C.I.') !!}
    {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el CI']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo electrónico']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('telefono', 'Teléfono') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Teléfono']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('coord_x', 'Coordenada X') !!}
    {!! Form::text('coord_x', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Coordenada X']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('coord_y', 'Coordenada Y') !!}
    {!! Form::text('coord_y', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Coordenada Y']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('categoria', 'Categoría') !!}
    {!! Form::select('categoria', $categoria, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-4">
    {!! Form::label('fase', 'Fase') !!}
    {!! Form::select('fase', $fase, null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>