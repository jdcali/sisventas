@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<h3>Editar Cliente: {{$persona->nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			
		</div>
		@endif
</div>
</div>
		{!!Form::model($persona,['method'=>'PATCH','action'=>['ClienteController@update',$persona->idpersona]])!!}
		{{Form::token()}}

		<div class="row">
		
			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label for="nombre"> Nombre</label>
					<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label for="direccion"> Direccion</label>
					<input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Direccion">
				</div>
			</div>

			
			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label>Documento</label>
					<select name="tipo_documento" class="form-control">
					@if ($persona->tipo_documento=='DNI')
						<option value="DNI" selected>DNI</option>
						<option value="RUC">RUC</option>
						<option value="PAS">Pasaporte</option>
					@elseif ($persona->tipo_documento=='RUC')
					<option value="DNI">DNI</option>
						<option value="RUC" selected>RUC</option>
						<option value="PAS">Pasaporte</option>
					@else
						<option value="DNI">DNI</option>
						<option value="RUC">RUC</option>
						<option value="PAS" selected>Pasaporte</option>
					@endif
					</select>
				</div>

			</div>
			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label for="num_documento">Numero documento</label>
					<input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control" placeholder="Numero de documento">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label for="stock">telefono</label>
					<input type="text" name="telefono" value="{{$persona->telefono}}" class="form-control" placeholder="telefono">
				</div>
			</div>
	
			<div class="col-lg-6 col-sm-6 col-md-6col-xs-12">
				<div class="form-group">
					<label for="descripcion">email</label>
					<input type="email" name="email" value="{{$persona->descripcion}}" class="form-control" placeholder="Descripcion...">
				</div>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

		{!!Form::close()!!}
		

@endsection