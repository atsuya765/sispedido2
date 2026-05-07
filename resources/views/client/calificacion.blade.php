@extends('layouts.app') 
@section('content') 
    <div class="container container-web-page">
        <div class="container-fluid">
            <div class="card">
                <div class="col-12" style="text-align: center;" > 
                    <div class="card-header">
                        <h2 > DÉJENOS TU CALIFICACIÓN </h2>
                    </div>  
                    <div class="card-body">
                        <h5>Queremos saber su opinión y calificación a nuestro servicio </h5>
                        <span class="fas fa-star" style="cursor: pointer;" id="1estar" onclick="select(this);"></span>
                        <span class="fas fa-star" style="cursor: pointer;" id="2estar" onclick="select(this);"></span>
                        <span class="fas fa-star" style="cursor: pointer;" id="3estar" onclick="select(this);"></span>
                        <span class="fas fa-star" style="cursor: pointer;" id="4estar" onclick="select(this);"></span>
                        <span class="fas fa-star" style="cursor: pointer;" id="5estar" onclick="select(this);"></span>
                        <br>
                        <textarea name="opinion" id="opinion" cols="30" rows="5" required placeholder=" Déjenos su comentario"></textarea>
                        <br>
                        <button class="btn btn-primary" onclick="calificar();">CALIFICAR</button>
                    </div>  
                </div>
            </div>  
        </div>  
    </div>
    <script>
        var cont;
        function select(item) {
            cont=item.id[0];  
            for (let i = 0; i < 5; i++) {
                if (i < cont) { 
                    document.getElementById((i+1)+'estar').style.color="orange";
                }else{
                    document.getElementById((i+1)+'estar').style.color="black";
                }
            }
        }
        function calificar() {
            let opinion= $('#opinion').val();
            if (opinion=='') {
                alert('opinion es obligatorio')
            }
            $.ajax({
                url:"{{ route('client.calificacion')}}",
                method:'GET',
                data:{opinion,cont },
                dataType:'json',
                success:function(data){
                    if (data==1) {
                        Swal.fire({ 
                            position: 'top-center',
                            icon: 'success',
                            title: 'Gracias por participar',
                            showConfirmButton: false,
                            timer: 1800
                        }).then((timer) => {  
                            location.href =  "{{ url('/')}}"; 
                        })
                    }
                }
            }); 
        }
    </script>
@endsection