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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Vendedor'));

export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('#form-edit') /* || e.target.matches('#btn-edit *') */) {
            d.getElementById('datos-usuario').style.display = "none";
            myModal.show();
            let padre = e.target.parentElement.parentElement;
            let id_vendedor = padre.querySelector(".id_vendedores").value;
            console.log(id_vendedor);
            if (id_vendedor != 0) {
                let data = await ajax(URL.API_PREPARAR_VENDEDOR, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_vendedor,
                    }),
                });
                data.forEach((value) => {
                    let { id, identificacion, nombre, apellido, telefono, estado_persona } = value;
                    //let codigo = codigo_cliente.replace(/['"]+/g, '');
                    if (!data.length) {
                        d.getElementById("identificacion").value = "000";
                        d.getElementById('nombres').value = "0";
                        d.getElementById('apellidos').value = "#";
                        d.getElementById('telefono').value = "12345678";
                    } else {

                        if (estado_persona == 1) {
                            d.getElementById('btn-activ').style.display = 'none';
                            d.getElementById('btn-bloq').style.display = 'block';
                        } else {
                            d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none';
                        }

                        d.getElementById('id').value = id;
                        d.getElementById("identificacion").value = identificacion;
                        d.getElementById('nombres').value = nombre;
                        d.getElementById('apellidos').value = apellido;
                        d.getElementById('telefono').value = telefono;
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
        }

        if (e.target.matches('#form-opne-modal') /* || e.target.matches('.btn-add-cliente *') */) {
            myModal.show();
            //let padre = e.target.parentElement.parentElement;
            //let acciones = padre.querySelector("#acciones");
            d.getElementById("acciones").style.display = 'none';
            d.getElementById('id').value = '';
            d.getElementById('identificacion').value = '';
            d.getElementById('nombre_cliente').value = '';
            d.getElementById('nombre_tienda').value = '';
            d.getElementById('direccion').value = '';
            d.getElementById('telefono').value = '';
        }

        if (e.target.matches('#form-save') /* || e.target.matches('.btn-save *') */) {
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

        if (e.target.matches('#form-bloq') /* || e.target.matches('.btn-bloq *') */) {
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

        if (e.target.matches('#form-activ') /* || e.target.matches('.btn-activ *') */) {
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

        if (e.target.matches('#form-delete') /* || e.target.matches('.btn-delete *') */) {
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

    });
}

export async function listar_vendedores(buscar) {
    let data = await ajax(URL.API_LISTAR_VENDEDORES, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });

    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-vendedores");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre,
            telefono,
            persona_id
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-vendedor").textContent = nombre;
        document
            .getElementById("movimiento")
            .content.querySelector(".telefono-vendedor").textContent = telefono;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_vendedores").value = persona_id;
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}