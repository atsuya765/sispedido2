 @extends('layouts.app') 
@section('content') 

	<div class="container container-web-page">
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Menú de platillos "La Ambrosía"</h3>
	    <p class="text-justify">Bienvenido al menú de platillos, acá encontrara todos los platillos disponibles en el restaurante.
	
	</p>

	      
	    <div class="container-cards full-box" style="padding-bottom: 40px;">
			@foreach ($platos as $row)
                <div class="card shadow-1-strong">
					<img class="card-img-top" src='{{asset("platos/$row->Imagen")}}' alt="nombre_platillo">
					<div class="card-body text-center">
						<h5 class="card-title font-weight-bold">{{$row->Nombre}}</h5>
						<p class="card-text lead"><span class="badge bg-secondary"> S/.{{$row->Precio}} </span></p>
					</div>
					<div class="card-body text-center"> 
						<a href="{{route('carrito.show', $row->id)}}" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</a> 
 
						<a href="{{route('client.detail', $row->id)}}" class="btn btn-info btn-sm">&nbsp;<i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a> 
					</div>
				</div>         
			@endforeach  
	    </div>


	    <nav aria-label="Page navigation example">
	        <ul class="pagination justify-content-center">
	            <li class="page-item">
	                <a class="page-link" href="#">Anterior</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">1</a>
	            </li>
	            <li class="page-item active">
	                <a class="page-link" href="#">2</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">3</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">Siguiente</a>
	            </li>
	        </ul>
	    </nav>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="saucerModal" tabindex="-1" aria-hidden="true" aria-labelledby="saucerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="saucerModalLabel">Buscar platillo</h5>
	                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	                <div class="form-outline mb-4">
	                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,25}" class="form-control" name="buscar_platillo" id="buscar_platillo" maxlength="25">
	                    <label for="buscar_platillo" class="form-label">¿Qué estás buscando?</label>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"><i class="fas fa-times fa-fw"></i> &nbsp; Cerrar</button>
	                <button type="button" class="btn btn-info"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
	            </div>
	        </div>
	    </div>
	
	</div>
@endsection