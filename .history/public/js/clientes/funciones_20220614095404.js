import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
export function requests() {
    d.addEventListener("click", async (e) => {
        e.preventDefault();
        if (e.target.matches('.btn-edit') || e.target.matches('.btn-edit *')) {
            let padre = e.target.parentElement.parentElement;
            let id_cliente = padre.querySelector(".id_cliente").value;
            console.log(id_cliente);
            if (id_cliente != 0) {
                let data = await ajax(URL.API_PREPARAR_CLIENTE, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_cliente,
                    }),
                });
                data.forEach((value) => {
                    let { codigo_cliente, ruta_id, nit, nombre_cliente, nombre_tienda, direccion_cliente, telefono_cliente, cliente_id } = value;
                    let codigo = codigo_cliente.replace(/['"]+/g, '');
                    if (!data.length) {
                        d.getElementById("codigo").value = "000";
                        d.getElementById('id').value = "0";
                        d.getElementById('ruta').value = "#";
                        d.getElementById('identificacion').value = "12345678";
                        d.getElementById('nombre_cliente').value = "nombre_cliente";
                        d.getElementById('nombre_tienda').value = "nombre_tienda";
                        d.getElementById('direccion').value = "direccion_cliente";
                        d.getElementById('telefono').value = "telefono_cliente";
                    } else {
                        //d.getElementById('id').value = cliente_id;
                        d.getElementById('ruta').value = ruta_id;
                        d.getElementById('codigo').value = codigo;
                        d.getElementById('identificacion').value = nit;
                        d.getElementById('nombre_cliente').value = nombre_cliente;
                        d.getElementById('nombre_tienda').value = nombre_tienda;
                        d.getElementById('direccion').value = direccion_cliente;
                        d.getElementById('telefono').value = telefono_cliente;
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
        }

        if (e.target.matches('.btn-add-cliente') || e.target.matches('.btn-add-cliente *')) {
            var myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Cliente'));
            myModal.show();
            d.getElementById('identificacion').value = '';
            d.getElementById('nombre_cliente').value = '';
            d.getElementById('nombre_tienda').value = '';
            d.getElementById('direccion').value = '';
            d.getElementById('telefono').value = '';
        }

        if (e.target.matches('.btn-save') || e.target.matches('.btn-save *')) {
            if (document.getElementById('id_cliente').value == "") {
                if (validar()) {
                    let data = await ajax(URL.API_AGREGAR_CLIENTES, {
                        method: "POST",
                        body: new FormData(e.target),
                    });
                    if (data == 1) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Exito...",
                            text: "Cliente Registrado Exitosamente",
                            showConfirmButton: true,
                            //timer: 1500,
                        });
                        generar_codigo();
                    } else if (data == 2) {
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Advertencia...",
                            text: "Esta identificacion ya esta en el sistema..",
                            showConfirmButton: true,
                            //timer: 1500,
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Error...",
                            text: "Error de Operación",
                            showConfirmButton: true,
                            //timer: 1500,
                        });
                    }
                }
            } else {
                let data = await ajax(URL.API_UPDATE_CLIENTES, {
                    method: "POST",
                    body: new FormData(e.target),
                });
                if (data == 1) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "!Exito...",
                        text: "Cliente Actualizado Exitosamente",
                        showConfirmButton: true,
                        //timer: 1500,
                    });
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 2000);
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Error...",
                        text: "Error de Operación",
                        showConfirmButton: true,
                        //timer: 1500,
                    });
                }
            }
        }




    });
}

export async function listar_clientes(buscar) {
    let data = await ajax(URL.API_LISTAR_CLIENTES, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let template_lista_clinetes = "";
    data.forEach((c) => {
        template_lista_clinetes += `
        <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-Cliente">
            <div class="card" style="height: 45px;border-radius:5px;margin-top:-25px">
                <div class="card-body p-2">
                    <div class="row">
                    <input type="hidden" class="id_cliente" value="${c.cliente_id}">
                        <div class="col-7">
                            <span class="text-dark">${c.nombre_cliente.toLowerCase()}</span>
                        </div>
                        <div class="col-5">
                            <span class="text-dark"> ${c.telefono_cliente}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
    });
}


export async function cargar_rutas() {
    let RUTAS = d.getElementById("ruta");
    let data = await ajax(URL.API_LISTAR_RUTAS, {
        method: "POST",
    });
    data.forEach((value) => {
        let { id, nombre_ruta } = value;
        let opt = document.createElement('option');
        opt.value = id;
        opt.textContent = nombre_ruta;
        RUTAS.appendChild(opt);
    });
}

export async function codigo_cliente() {
    let data = await ajax(URL.API_CODIGO_CLIENTE, {
        method: "POST",
    });
    if (data.length) {
        document.getElementById("codigo").value = "000";
    } else {
        document.getElementById("codigo").value = data
    }
}