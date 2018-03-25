{!! Form::open(array('url'=>'almacen/articulo','method'=>'GET','autocomplete'=>'on','role'=>'search'))!!}

<div class="form-group">
	<div class="import-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>			
		</span>
		

		
	</div>
	</div>

{{Form::close()}}