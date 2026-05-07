@extends('admin.layout.app')
@section('title', 'pedidos-detalle') 
@section('content') 

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h1 class="page-title">Pedidos</h1>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="white-box">  
                <div class="container-fluid">
                    @foreach($orden_detalle as $row) 
                        <div class="bag-item full-box">
                            <div class="full-box"> 
                                <div class="row ">
                                    <div class="col-12 col-lg-2 text-left mt-2">  
                                        <img src='{{asset("platos/$row->Imagen")}}' class="img-fluid" style="border-radius:5px;" height="20px" width="60px" alt="platillo_nombre"> 
                                    </div>
                                    <div class="col-12 col-lg-3 text-left mt-3">  
                                        <label for="product_cant_1" class="form-label h4">{{$row->Nombre}}</label>
                                    </div>
                                    <div class="col-12 col-lg-3 text-left mt-3">   
                                        <label for="product_cant_1" class="form-label h4">cantidad-{{$row->cantidad}}</label> 
                                    </div>
                                    <div class="col-12 col-lg-4 text-right mt-3">
                                        <span class="poppins-regular font-weight-bold h4">SUBTOTAL: &nbsp; S/. {{$row->cantidad*$row->Precio}}</span>
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                        <hr style="height: 2px; margin: 0rem;">  
                    @endforeach
                </div>   
            </div> 
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="white-box">  
                <div class="container-fluid">
                    @php
                        $cliente=""; $email=""; $telefone=""; $direccion=""; $lugar="";
                        $id=0 ;  $total=0;
                    @endphp
                    @foreach ($orden_detalle as $row)
                        @php
                            $cliente= $row->name; $email= $row->email; $telefone= $row->telefono; $direccion= $row->direccion; $id=$row->id_orden;  $total=$row->total;
                        @endphp
                    @endforeach
                    <div class="row">
                        <P class="text-primary text-decoration-underline text-center">DATOS DEL CLIENTE</P>
                        <div class="col-12 col-lg-12 text-left text-info">  
                            <label for="product_cant_1" class="form-label mt-2 h5 ">CLIENTE: {{$cliente}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">  
                            <label for="product_cant_1" class="form-label mt-2 h5">EMAIL: {{$email}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">  
                            <label for="product_cant_1" class="form-label mt-2 h5">TELEFONO: {{$telefone}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">  
                            <label for="product_cant_1" class="form-label mt-2 h5">DIRECCION: {{$direccion}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <div class="col-12 col-lg-12 text-left text-danger">  
                            <label for="product_cant_1" class="form-label mt-2 h5">TOTAL A PAGAR: S/. {{$total}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <div class="col-12 col-lg-12 text-left text-danger">  
                            <label for="product_cant_1" class="form-label mt-2 h5">Lugar: {{$lugar}}</label> 
                            <hr style="height: 1px; margin: 0rem;"> 
                        </div>
                        <br>
                        <br> 
                        <a href="{{ route('orden.finalizar', $id)}}" class="btn btn-success text-light" onclick="return confirm('¿ Estas Seguro finalizar pedido?')"> Finalizar Pedido</a>
                    </div> 
                    
                    <!-- Mapa de ubicación (debajo del botón "Finalizar Pedido") -->
                    <div class="map-container" style="margin-top: 20px; border: 2px solid #ccc; padding: 10px; border-radius: 8px; height: 400px; position: relative;">
                        <div id="map" style="width: 100%; height: 100%;"></div>
                    </div> 
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', async () => {
                            const address = "{{ $direccion }}"; // Dirección a geolocalizar
                            console.log("Dirección a geolocalizar:", address); // Verifica que la dirección sea correcta

                            const apiKey = '624fa44fe8b164adbc5d3e071b4856af'; // Clave de la API de Positionstack
                            const positionstackUrl = `https://api.positionstack.com/v1/forward?access_key=${apiKey}&query=${encodeURIComponent(address)}&limit=1`;

                            try {
                                const response = await fetch(positionstackUrl);
                                const data = await response.json();
                                console.log("Datos recibidos de Positionstack:", data); // Verifica los datos de la API

                                let latitude = -12.0464;  // Coordenadas por defecto (Lima)
                                let longitude = -77.0428; 

                                // Si la API devuelve una ubicación válida
                                if (data && data.data && data.data.length > 0) {
                                    const location = data.data[0];
                                    latitude = location.latitude;
                                    longitude = location.longitude;
                                }

                                // Inicializamos el mapa con Leaflet.js
                                const map = L.map('map').setView([latitude, longitude], 14);

                                // Agregar capa del mapa (usando OpenStreetMap como proveedor)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(map);

                                // Marcador en la ubicación
                                L.marker([latitude, longitude]).addTo(map)
                                    .bindPopup('<b>Ubicación del cliente</b>')
                                    .openPopup();

                                // Recalcular el tamaño del mapa después de hacer zoom
                                map.on('zoomend', function() {
                                    map.invalidateSize();
                                });

                            } catch (error) {
                                console.error('Error al obtener las coordenadas:', error);
                                document.getElementById('map').innerHTML = '<p>Ocurrió un error al cargar el mapa. Intenta nuevamente.</p>';
                            }
                        });
                    </script>
                    <!-- Cargar Leaflet.js -->
                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                </div>   
            </div> 
        </div> 
    </div> 
</div>

@endsection
