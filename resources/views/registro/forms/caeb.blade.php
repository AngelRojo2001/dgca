<div class="form-group col-lg-8">
    {!! Form::label('caeb', 'Caeb') !!}
    <select class="form-control" name="caeb[]">
        <option value="">Seleccione...</option>
        @foreach($caebs as $caeb)
            <option value="{{ $caeb->id }}">{{$caeb->codigo}} - {{ $caeb->descripcion }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-lg-2">
    {!! Form::label('categoria', 'Categoría') !!}
    {!! Form::select('categoriaCaeb[]', $categoria, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-lg-2">
    {!! Form::label('button', 'Acción') !!}
    {!! Form::button('Agregar Caeb', ['class' => 'btn btn-default', 'id' => 'btn_agregar']) !!}
</div>


