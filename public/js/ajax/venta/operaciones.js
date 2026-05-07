
let selected_pagos = document.getElementById('selectpago'); 
let agregarPago = document.getElementById('idagregarpago');
let realizarpago = document.getElementById('realizarpago');
let cerrar_modal = document.getElementById('cerrar_modal');
const tabla = document.getElementById('tabla');

$(document).ready(function () {
    $('#venta_modal').hide();
    $('#form_pago').hide();
    calcularPrecios(false);
});
 
tabla.addEventListener('click', e => { 
    btnAccion(e);
})
 
const btnAccion = e => {
    
    if (e.target.classList.contains("cant") || e.target.classList.contains("desc")) {
        console.log("holaa"); 
        let d = e.target.parentNode.parentNode;
        let Id_pro = d.children[0].innerHTML;
        let nom = d.children[1].innerHTML;
        let cc = d.children[2].childNodes; 
        let precio = d.children[3].innerHTML;
        let dd = d.children[4].childNodes;
        let idpro = d.children[7].childNodes;
        let idProducto = idpro[1].value;
        
        $(dd).change(function () { 
            let des = dd[0].value;
            let can = cc[1].value;
            operacion(Id_pro, nom, can, precio, des, idProducto);  
        })
        $(cc).change(function () {  
            let des = dd[0].value;
            let can = cc[1].value;
            operacion(Id_pro, nom, can, precio, des, idProducto);  
        })

    } 
    e.stopPropagation();
}

function operacion(Id_pro, nom, can, precio, des, idProducto) {
    let Id_proceso = Id_pro.trim();
    let id = idProducto.trim();
    let nombre = nom.trim();
    let descuento = des.trim();
    let cantidad = can.trim();
    let precioventa = precio.trim();
    let costototal = (can * precio) - des;
    const action = `${URL}venta/saveproceso`; 
    fetch(action, {
        method: 'POST', body: JSON.stringify({
            "Id": Id_proceso, "Id_producto": id, "Nombre": nombre, "Precio_venta": precioventa, "Descuento": descuento, "Cantidad": cantidad, "Costo_total": costototal
        }),
        headers: { 'Content-Type': 'application/json' }
    }) 
    .then(rpta => {
        return rpta.json();
    })
    .then(response => {
        switch (response.success) {
            case 1:
                location.href = response.redirection;
                break;
            case 0:
                alert(response.message);
                break;
        }
    });
}

selected_pagos.addEventListener('click', selectpagoss); 
function selectpagoss() { 
    let obj = (selected_pagos.value).trim();
    $('#venta_modal').show();
    MostrarFromPagos(obj)
}
function MostrarFromPagos(obj) {   
    if (obj == "EFECTIVO" || obj == "TRANSFERENCIA") {  
        document.getElementById('tipo_pago').innerText = obj;
        document.getElementById('idformaPago').value = obj;
        document.getElementById('campodinamico').innerHTML = ""; 
    } else {
        document.getElementById('tipo_pago').innerText = obj; 
        document.getElementById('idformaPago').value = obj;
        forms2();
    }
}
function forms2() {
    document.getElementById('campodinamico').innerHTML = "";
    document.getElementById('campodinamico').innerHTML = ` 
        <div class="col-sm-6 col-md-4">
            <div class="float-end form-group p-2">
                <label style="text-align:right;" for="ncomprobante" class="control-label">COMPROBANTE:</label>
            </div>
        </div>
        <div class="col-6 col-md-8">
            <div class="form-group">
                <input type="number" id="pago_ingreso" name="ncomprobante" placeholder="00" min="0" id="ncomprobante" class="form-control">
                <i id="aviso" style="color:red;"></i>
            </div>
        </div> 
          `;
}
 
agregarPago.addEventListener('click', (e) => {
   let bool=e.target.classList.contains("pago") 
    calcularPrecios(bool)
});

function calcularPrecios(bool) {
    let TOTAL = document.getElementById('txtTotal');
    let PAGO = document.getElementById('idpago');
    document.getElementById('preciototal').innerHTML = TOTAL.textContent;
    if (bool==false) { 
        PAGO.value = TOTAL.textContent;
    }
    let vuelto = PAGO.value - ((TOTAL.textContent)*1);
    document.getElementById('total_pagado').innerHTML = PAGO.value;
    document.getElementById('vuelto').innerHTML = vuelto;
    document.getElementById('idtotal').value = (TOTAL.textContent) * 1;
    document.getElementById('idcambio').value = vuelto; 
}

realizarpago.addEventListener('click', function () { 
    const row = $('#tabla tr').length;
    if (row > 0) { 
        $('#form_pago').show();
    } else {
        alert("agrega productos al carrito")
    }
})
cerrar_modal.addEventListener('click', function () { 
    $('#venta_modal').hide();
    $('#form_pago').hide();
})