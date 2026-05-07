 

const agregarproducto = document.getElementById('guardar');
const form = document.getElementById('cotizar'); 
const eliminar = document.getElementById('limpiar');

$(document).ready(function () {
    $('#agregar-producto').hide();
    $('#buscar-form').submit(e => {
        e.preventDefault();
        let nombre = $('#producto').val();
        $.ajax({
            url: `${URL}venta/buscar`,
            data: { nombre },
            type: 'POST',
            success: function (response) {
                if (!response.error) {
                    let data = JSON.parse(response);
                    data.forEach(data => {
                        $("#codigo").text(data.Id);
                        $("#nombre").text(data.Nombre);
                        $("#precio").text(data.Precioventa);
                        $("#stock").text(data.Stock); 
                    });
                    if (data.length > 0) {
                        $('#agregar-producto').show();
                    } else { $('#agregar-producto').hide(); }
                }
            }
        });
    });
    let total = 0;
    $('#tabla tr').each(function () {
        let costototal = ($(this).find('td').eq(5).text()) * 1; 
        total += costototal;
    });    
    $('#txtTotal').html(total);
    
});
 
agregarproducto.addEventListener('click', function () { 
    let id = ($("#codigo").text())*1;
    let nombre = $("#nombre").text();
    let precioventa = $("#precio").text()*1;
    let cantidad = $("#cantidad").val();
    let costototal = ($("#precio").text() * 1) * cantidad;  
    $('#agregar-producto').hide();    
    const action = `${URL}venta/saveproceso`;
    fetch(action, {
        method: 'POST', body: JSON.stringify({
            "Id": 0, "Id_producto": id, "Nombre": nombre, "Precio_venta": precioventa, "Descuento": 0, "Cantidad": cantidad, "Costo_total": costototal
        }),  
        headers: { 'Content-Type': 'application/json'}
    })
    .then(rpta => {
        return rpta.json();
    })
    .then(response => { 
        console.log(response.message);
    switch (response.success) {
        case 1: 
            location.href = response.redirection;
            break;
        case 0:
            alert(response.message);
            break; 
    }
    }); 
}); 
 

form.addEventListener('click', function () {
    const row = $('#tabla tr').length; 
    if (row > 0) {  
        (async () => {
            const { value: nombres } = await Swal.fire({
                title: 'Ingrese el nombre del cliente',
                icon: 'info',
                width: '30%',
                padding: '1rem',
                background: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                input: 'text',
                inputPlaceholder: 'Nombres',
                inputValue: '',
                inputValidator: (value) => {
                    if (!value) {
                        return '¡Es obligatorio el nombre!'
                    }
                },
                showCloseButton: true, 
                focusConfirm: false,
                confirmButtonText:'Guardar'
            });
            if (nombres) {
                guardar_cotizacion(nombres);
            }
        })()
    } else {
        Swal.fire({
            icon:'error',
            title: 'No hay productos en carrito', 
            confirmButtonText: 'Ok',  
            timer: 1400
        }) 
    }
});

function guardar_cotizacion(nombres) { 
    var data=[];
    $('#tabla tr').each(function () {
        let id = ($(this).find('td').eq(0).text())*1;
        let id_producto = ($(this).find('#id_producto').val()) * 1;
        let nombre_producto = $(this).find('td').eq(1).text();
        let cantidad = ($(this).find('.cant').val())*1;
        let preciocosto = ($(this).find('td').eq(3).text())*1;
        let descuento = ($(this).find('.desc').val())*1;
        let costototal = ($(this).find('td').eq(5).text()) * 1;  
        data.push({
            "Id": id, "Id_producto": id_producto, "Nombre": nombre_producto,"Cliente": nombres, "Cantidad": cantidad,
            "Precio_venta": preciocosto, "Descuento": descuento, "Costo_total": costototal 
        }); 
    });  
    $.ajax({
        url: `${URL}cotizacion/save`,
        data: {
            data
        },
        type: 'POST',
        success: function (response) {
            if (!response.error) { 
                let dato = JSON.stringify(data);
                limpiar();
                setTimeout(function () {
                    location.reload()
                }, 1500)
                window.open(`${URL}cotizacion/imprimir/${dato}`, 'imprimir | cotización'); 
            }
        }
    });
}

eliminar.addEventListener('click', function () {
    limpiar();
    setTimeout(function () {
        location.reload()
    }, 1500)
});
function Confirmar() {
    var retVal = confirm("¿Seguro desea continuar?");
    if (retVal == true) { 
        limpiar();
        setTimeout(function () {
            location.reload()
        }, 1500)
        return true;
    } else { 
        return false;
    }
}
function limpiar() {
    $.ajax({
        url: `${URL}venta/deleteAll`, 
        type: 'POST' 
    });
} 
  