
const frm = document.getElementById('from_login');  
frm.addEventListener('submit', (e) => { 
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const clave = document.getElementById('clave');
    if (usuario == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave == "") {
        clave.classList.add("is-invalid");
        usuario.classList.remove("is-invalid");
        clave.focus();
    } else {
        const url = `${URL}home/validar`;  
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const response = JSON.parse(this.responseText);
                if (response === "OK") {
                    window.location = `${URL}dashboard`; 
                } else {
                    document.getElementById('alerta').classList.remove("d-none");
                    document.getElementById('alerta').innerHTML=response;
                }
                usuario.addEventListener('keyup', function () {
                    document.getElementById('alerta').classList.add("d-none"); 
                })
                clave.addEventListener('keyup', function () {
                    document.getElementById('alerta').classList.add("d-none"); 
                })
            }
        } 
    }
})

 

