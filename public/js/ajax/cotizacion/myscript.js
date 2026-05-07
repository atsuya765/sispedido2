 
let form = document.getElementById('agregarCarro');
var data = "";
$(document).ready(function () { 
    search();
    $('#tabla').DataTable();
});

$('#nombre').keyup(function () {
    search();
});

$('#fecha').change(function () {
    search();
});

function search() {
    let nombre;
    let fecha;
    if ($('#nombre').val()) {
        nombre = $('#nombre').val();
        fecha = $('#fecha').val();
    } else if (!$('#nombre').val()) {
        nombre = "";
        fecha = "";
    } 
    $.ajax({
        url: `${URL}cotizacion/get`,
        data: {
            nombre,
            fecha
        },
        type: 'POST',
        success: function (response) { 
            data = response;
            if (!response.error) {  
                let datas = JSON.parse(response); 
                let template = "";
                var numformat = new Intl.NumberFormat("en-US", {
                    style: "currency",
                    currency: "USD"
                });  
                datas.forEach(datas => {
                    template += `
                            <tr  >
                            <td>${datas.Id}</td>
                            <td>${datas.Nombre}</td>
                            <td>${datas.Cliente}</td>   
                            <td>${datas.Cantidad}</td>
                            <td>${(numformat.format(datas.Precio_venta).replaceAll(',', '.'))}</td>
                            <td>${(numformat.format(datas.Descuento).replaceAll(',', '.'))}</td>
                            <td>${(numformat.format(datas.Costo_total).replaceAll(',', '.'))}</td>
                            <td>${datas.created_at}</td> 
                            </tr> `
                });
                $('#lista-cotizacion').html(template);
            }
        }
    });
}

form.addEventListener('click', function () {
    let datos = JSON.parse(data);  
    datos.forEach(datos => {
        let id = datos.Id_producto;
        let nombre = datos.Nombre;
        let precioventa = datos.Precio_venta;
        let cantidad = datos.Cantidad;
        let descuento = datos.Descuento;
        let costototal = datos.Costo_total; 

        const action = `${URL}venta/saveproceso`;
        fetch(action, {
            method: 'POST', body: JSON.stringify({
                "Id": 0, "Id_producto": id, "Nombre": nombre,
                "Precio_venta": precioventa, "Descuento": descuento, "Cantidad": cantidad, "Costo_total": costototal
            }),
            headers: { 'Content-Type': 'application/json' }
        })
          
    });
    setTimeout(function () { 
        $(location).attr('href', `${URL}venta`);
    }, 2500)
     
});
 