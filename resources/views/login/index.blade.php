@extends('templates.base')

@section('title','Pagina de Inicio')

@section('body')
	<div class="row">
		<div class="box">
			<div class="col-lg-6 col-lg-offset-3">
				@include('alerts.errors')
				@include('alerts.request')
				{!! Form::open(['url' => '/']) !!}
					<div class="form-group">
						{!! Form::label('login', 'Login') !!}
						{!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Ingrese login']) !!}
				    </div>
				    <div class="form-group">
				    	{!! Form::label('password', 'Password') !!}
				    	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese password']) !!}
				    </div>
				    <div class="checkbox">
				    	<label>
				    		{!! Form::checkbox('remember', null) !!} Remenber Me
				    	</label>
				    </div>
				    <div>
				    	{!! Form::submit('Ingresar', ['class' => 'btn btn-success']) !!}
				    </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection