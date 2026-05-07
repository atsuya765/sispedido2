@extends('layouts.app') 
@section('content') 

	<div class="banner">
	    <div class="banner-body">
	        <h3 class="text-uppercase">Bienvenido a RESTAURANTE "VILLA VENECIA"</h3>
	        <p>Los mejores platillos y la mejor calidad los encuentras en restaurante "VILLA VENECIA"</p>
	        <a href="{{route('client.menu')}}" class="btn btn-warning" style="padding: 34px; font-size: x-large;background-color: #293462"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ir al menu</a>
	    </div>
	</div> 
	<div class="container container-web-page">
	    <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros servicios</h3>
	    <br>
	    <div class="row">
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-shipping-fast fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Envíos a domicilio</h5>
	            <p class="text-left">
¡Llegó la hora de disfrutar del mejor sabor desde la comodidad de tu hogar! 
📞 ¡Haz tu pedido ahora y recibe un 20% de descuento en toda nuestra deliciosa carta por delivery! 
🚗💨Entrega rápida y segura, directo a tu puerta. ¡Sin complicaciones!
📱 ¡Ordena fácilmente desde tu celular y paga sin salir de casa!
¡Esperamos tu llamada para hacer que tu comida sea inolvidable!
📞 944138160</p>
	        </div>
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-utensils fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Ventas al por mayor</h5>
	            <p class="text-left">¡Oferta imperdible! 🔥
Compra al por mayor y menor con envío a domicilio 🚚
Calidad garantizada y precios competitivos 
¡Haz tu pedido ahora! </p>
	        </div>
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-store-alt fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Reservaciones de local</h5>
	            <p class="text-left">¡Estimado cliente!

Espero que te encuentres muy bien. Quería compartir contigo una emocionante oportunidad que no querrás dejar pasar. Nuestro local, perfecto para tus necesidades, está disponible para reservar.</p>
	        </div>
	    </div>
	</div>

	<hr> 

	<div class="container container-web-page">
	    <div class="row justify-content-md-center">
	        <div class="col-12 col-md-6">
	            <figure class="full-box">
	                <img src="./assets/img/registration.png" alt="registration" class="img-fluid">
	            </figure>
	        </div>
	        <div class="w-100"></div>
			@if (Route::has('login')) 
			    @auth 

				@else
				<div class="col-12 col-md-6">
					<h3 class="text-center text-uppercase poppins-regular font-weight-bold">Crea tu cuenta</h3>
					<p class="text-justify">
						Crea tu cuenta para poder realizar pedidos de platillos hasta la puerta de tu casa, es muy fácil y rápido.
					</p>
					<p class="text-center">
						<a href="{{route('register')}}" class="btn btn-primary" >Crear cuenta</a>
					</p>
				</div> 
				@endauth
			@endif
	    </div>
	</div> 
@endsection
