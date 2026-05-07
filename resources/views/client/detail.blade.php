@extends('layouts.app') 
@section('content') 
<div class="container container-web-page"> 
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Detalles de platillo</h3>
	    <hr>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-12 col-lg-5">
	                <!--cover-->
	                <figure class="full-box">
	                    <img class="img-fluid"  src='{{asset("platos/$platos->Imagen")}}' alt="platillo_">
	                </figure>

	                <!-- Galery -->
	                <h5 class="poppins-regular text-uppercase" style="padding-top: 70px;">Galería de imágenes</h5>
	                <hr>
	                <div class="galery-details full-box">

	                    <!--cover-->
	                    <figure class="full-box">
	                        <a data-fslightbox="gallery" href="{{asset("platos/$platos->Imagen")}} ">
	                            <img class="img-fluid" src="{{asset("platos/$platos->Imagen")}}" alt="platillo_">
	                        </a>
	                    </figure>

	                    <!--otras-->
	                    <figure class="full-box">
	                        <a data-fslightbox="gallery" href="{{asset("platos/$platos->Imagen2")}}">
	                            <img class="img-fluid" src="{{asset("platos/$platos->Imagen2")}}" alt="platillo_">
	                        </a>
	                    </figure>

	                    <figure class="full-box">
	                        <a data-fslightbox="gallery" href=" {{asset("platos/$platos->Imagen3")}}">
	                            <img class="img-fluid" src="{{asset("platos/$platos->Imagen3")}}" alt="platillo_">
	                        </a>
	                    </figure>

	                </div>
	            </div>
	            <div class="col-12 col-lg-7">

	                <h4 class="font-weight-bold poppins-regular tittle-details">{{$platos->Nombre}}</h4>

	                <p class="text-justify lead" style="padding: 40px 0;">
	                    <span class="text-info lead font-weight-bold">Descripción</span><br>
	                    {{$platos->Descripcion}}
	                </p>

	                <p class="lead font-weight-bold">Precio: S/. {{$platos->Precio}}</p>

	                <!-- Agregar al carrito --> 
	                <form action="{{ route('carrito.store')}}" method="POST" enctype="multipart/form-data" style="padding-top: 70px;">
						@csrf
	                    <div class="container-fluid">
	                        <div class="row">
	                            <div class="col-12 col-md-6">
									<div class="form-outline mb-4">
										<input type="hidden" name="id_platos" value="{{ $platos->id}}">
										<input type="text" value="1" class="form-control text-center" name="cantidad" id="product_cant" pattern="[0-9]{1,10}" maxlength="10" >
	                                    <label for="product_cant" class="form-label">Cantidad</label>
	                                </div>
	                            </div>
	                            <div class="col-12 col-md-6 text-center">
	                                <button type="submit" class="btn btn-info"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar al carrito</button>
	                            </div>
	                        </div>
	                    </div>
	                </form> 
	            </div>
	        </div>
	    </div>
	</div>
@endsection