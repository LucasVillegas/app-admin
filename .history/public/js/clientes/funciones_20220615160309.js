import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Cliente'));

export function requests() {
    let btn_add_cliente = d.getElementsByClassName('btn-add-cliente');
    if (btn_add_cliente) {

    }
    btn_add_cliente.addEventListener("click", async (e) => {
        e.preventDefault();
        if (e.target.matches('#btn-edit') || e.target.matches('#btn-edit *')) {
            myModal.show();
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
                    let { codigo_cliente, ruta_id, nit, nombre_cliente, nombre_tienda, direccion_cliente, telefono_cliente, cliente_id, estado_cliente } = value;
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

                        if (estado_cliente == 1) {
                            d.getElementById('btn-activ').style.display = 'none';
                            d.getElementById('btn-bloq').style.display = 'block';
                        } else {
                            d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none';
                        }

                        d.getElementById('id').value = cliente_id;
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
    });
    /*     d.addEventListener("click", async (e) => {
            e.preventDefault();
    
            if (e.target.matches('#btn-edit') || e.target.matches('#btn-edit *')) {
                myModal.show();
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
                        let { codigo_cliente, ruta_id, nit, nombre_cliente, nombre_tienda, direccion_cliente, telefono_cliente, cliente_id, estado_cliente } = value;
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
    
                            if (estado_cliente == 1) {
                                d.getElementById('btn-activ').style.display = 'none';
                                d.getElementById('btn-bloq').style.display = 'block';
                            } else {
                                d.getElementById('btn-activ').style.display = 'block';
                                d.getElementById('btn-bloq').style.display = 'none';
                            }
    
                            d.getElementById('id').value = cliente_id;
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
                myModal.show();
                d.getElementById('identificacion').value = '';
                d.getElementById('nombre_cliente').value = '';
                d.getElementById('nombre_tienda').value = '';
                d.getElementById('direccion').value = '';
                d.getElementById('telefono').value = '';
                d.getElementById('acciones').style.display = 'none';
            }
    
            if (e.target.matches('.btn-save') || e.target.matches('.btn-save *')) {
                if (document.getElementById('id').value == "") {
                    let data = await ajax(URL.API_AGREGAR_CLIENTES, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            ruta: d.getElementById('ruta').value,
                            codigo: d.getElementById('codigo').value,
                            identificacion: d.getElementById('identificacion').value,
                            nombre_cliente: d.getElementById('nombre_cliente').value,
                            nombre_tienda: d.getElementById('nombre_tienda').value,
                            direccion: d.getElementById('direccion').value,
                            telefono: d.getElementById('telefono').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Cliente Registrado Exitosamente'
                        });
                        codigo_cliente();
                        listar_clientes("");
                        d.getElementById('buscar').value = '';
                        myModal.hide();
                    } else if (data == 2) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Esta identificacion ya esta en el sistema..'
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error de Operación'
                        });
                    }
                } else {
    
                    let data = await ajax(URL.API_ACTUALIZAR_CLIENTE, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id').value,
                            ruta: d.getElementById('ruta').value,
                            codigo: d.getElementById('codigo').value,
                            identificacion: d.getElementById('identificacion').value,
                            nombre_cliente: d.getElementById('nombre_cliente').value,
                            nombre_tienda: d.getElementById('nombre_tienda').value,
                            direccion: d.getElementById('direccion').value,
                            telefono: d.getElementById('telefono').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Cliente Actualizado Exitosamente'
                        });
                        listar_clientes("");
                        d.getElementById('buscar').value = '';
                        myModal.hide();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error de Operación'
                        });
                    }
                }
            }
    
            if (e.target.matches('.btn-bloq') || e.target.matches('.btn-bloq *')) {
                Swal.fire({
                    title: "Quieres Bloquearlo?",
                    text: "Podrás revertirlo despues!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "SI!",
                    cancelButtonText: "NO",
                }).then(async (result) => {
                    if (result.value) {
                        let data = await ajax(URL.API_BLOQUEAR_CLIENTE, {
                            method: "POST",
                            body: appendForm({
                                form: d.createElement("form"),
                                id: d.getElementById('id').value,
                            }),
                        });
                        if (data == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Cliente Bloqueada Exitosamente'
                            });
                            listar_clientes("");
                            d.getElementById('buscar').value = '';
                            myModal.hide();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error de Operación'
                            });
                        }
                    }
                });
            }
    
            if (e.target.matches('.btn-activ') || e.target.matches('.btn-activ *')) {
                Swal.fire({
                    title: "Quieres Activarlo?",
                    text: "Podrás revertirlo despues!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "SI!",
                    cancelButtonText: "NO",
                }).then(async (result) => {
                    if (result.value) {
                        let data = await ajax(URL.API_ACTIVAR_CLIENTE, {
                            method: "POST",
                            body: appendForm({
                                form: d.createElement("form"),
                                id: d.getElementById('id').value,
                            }),
                        });
                        if (data == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Cliente Activo Exitosamente'
                            });
                            listar_clientes("");
                            d.getElementById('buscar').value = '';
                            myModal.hide();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error de Operación'
                            });
                        }
                    }
                });
            }
    
            if (e.target.matches('.btn-delete') || e.target.matches('.btn-delete *')) {
                Swal.fire({
                    title: "Quieres Eliminarlo?",
                    text: "No Podrás revertirlo despues!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "SI!",
                    cancelButtonText: "NO",
                }).then(async (result) => {
                    if (result.value) {
                        let data = await ajax(URL.API_ELIMINAR_CLIENTE, {
                            method: "POST",
                            body: appendForm({
                                form: d.createElement("form"),
                                id: d.getElementById('id').value,
                            }),
                        });
                        if (data == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Cliente Eliminado Exitosamente'
                            });
                            listar_clientes("");
                            d.getElementById('buscar').value = '';
                            myModal.hide();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error de Operación'
                            });
                        }
                    }
                });
            }
    
        }); */
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
            <div class="card" style="height: 60px;border-radius:5px;margin-top:-25px">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-warning btn-sm" id="btn-edit" class="btn-edit" ><i class="bi bi-pencil-square"></i>
                                <input type="hidden" class="id_cliente" value="${c.cliente_id}">
                            </button>
                        </div>
                        
                        <div class="col-10">
                            <span>${c.nombre_cliente.toLowerCase()}</span>
                                <br/>
                            <span>${c.telefono_cliente.toLowerCase()}</span>
                        </div>
                    </div>
                </div>
            </div>
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
        d.getElementById('acciones').style.display = 'block';
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