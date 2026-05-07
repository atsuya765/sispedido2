@extends('admin.layout.app')
@section('title', 'calificacion')
 
@section('content') 
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h1 class="page-title">Calificación</h1>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12"> 
            <h4 class="text-center">Calificaciones de los clientes</h4> 
            <div id="contenedor" class="white-box ">   
                 
            </div>
        </div>
    </div>
</div> 
<script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() { 
        $.ajax({
            url:"{{ route('client.list') }}",
            method:'GET',
            data:{},
            dataType:'json',
            success:function(data){ 
                if(data.cont>0) { 
                    console.log(data.calificacion);
                    let datas= data.calificacion;
                    let star="";
                    let campo="";
                    datas.forEach(datas => {
                        star ="";
                        for (let i = 0; i < 5; i++) {
                            if (i < datas.puntuacion) { 
                                star +=`<span class="fas fa-star" style="cursor: pointer; color: orange;" ></span>`
                            }else{
                                star +=`<span class="fas fa-star" style="cursor: pointer; color: black;" ></span>` 
                            }
                        }
                        campo +=`  
                            <div  class="bag-item full-box ">
                                <div class="row "> 
                                    <div class="col-12 col-lg-3 text-left mt-3">  
                                        <label for="product_cant_1" class="form-label h5">NOMBRE:  &nbsp;${datas.nombres}</label>
                                    </div>
                                    <div class="col-12 col-lg-3 text-left mt-3"> 
                                        <label for="product_cant_1" class="form-label h5">CALIFICACION:  &nbsp;</label>${star}
                                    </div>
                                    <div class="col-12 col-lg-6 text-rigth mt-3">
                                        <span class="poppins-regular font-weight-bold h5">OPINION: &nbsp;${datas.opinion}</span>
                                    </div> 
                                </div>  
                            </div> 
                            <hr style="height: 2px; margin: 0rem;">  
                             `
                    }); 
                    $('#contenedor').html(campo);
                }else{ 
                    campo=`
                        <div  class="bag-item full-box ">
                            <div class="row ">  
                                <label for="product_cant_1" class="form-label h5 text-center">AUN NO TIENES CALIFICACIONES</label>
                            </div>  
                        </div> 
                    `;
                    $('#contenedor').html(campo);
                }
            }
        });
    });  
</script>
@endsection