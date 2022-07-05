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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Rutas'));
export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('#form-save')) {
            if (d.getElementById('id').value == "") {
                let data = await ajax(URL.API_AGREGAR_RUTAS, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        nombre_ruta: d.getElementById('nombre_ruta').value,
                        vendedor: d.getElementById('vendedor').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ruta Registrada Exitosamente'
                    });
                    listar_rutas("");
                    d.getElementById('buscar').value = '';
                    myModal.hide();
                } else if (data == 2) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'La Ruta ya se encuentra registrada en el sitema.'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ruta no Agregada'
                    });
                }
            } else {
                let data = await ajax(URL.API_ACTUALIZAR_RUTAS, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id').value,
                        nombre_ruta: d.getElementById('nombre_ruta').value,
                        vendedor: d.getElementById('vendedor').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ruta Actualizada Exitosamente'
                    });
                    listar_rutas("");
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

        //Formulario apra editar datos personales
        if (e.target.matches('.form-edit')) {
            myModal.show();
            let padre = e.target.parentElement.parentElement;
            let id_ruta = padre.querySelector(".id_ruta").value;
            console.log(id_ruta);
            if (id_ruta != 0) {
                let data = await ajax(URL.API_PREPARAR_RUTAS, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_ruta,
                    }),
                });
                data.forEach((value) => {
                    let { id, nombre_ruta, estado_ruta, vendedor_id } = value;
                    if (!data.length) {
                        d.getElementById("nombre_ruta").value = "nombre_ruta";
                        d.getElementById("vendedor").value = "vendedor";
                    } else {
                        d.getElementById('id').value = id;
                        d.getElementById("nombre_ruta").value = nombre_ruta;
                        d.getElementById("vendedor").value = vendedor_id;
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
        }

        if (e.target.matches('#form-opne-modal')) {
            myModal.show();
            d.getElementById('id').value = '';
            d.getElementById('nombre_ruta').value = '';
            d.getElementById('vendedor').value = 'Seleccionar Vendedor';
        }

        if (e.target.matches('#form-bloq')) {
            let padre = e.target.parentElement.parentElement;
            let id_ruta = padre.querySelector(".id_ruta").value;
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
                    let data = await ajax(URL.API_BLOQUEAR_RUTAS, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: id_ruta,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Ruta Bloqueada Exitosamente'
                        });
                        listar_rutas("");
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

        if (e.target.matches('#form-active')) {
            let padre = e.target.parentElement.parentElement;
            let id_ruta = padre.querySelector(".id_ruta").value;
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
                    let data = await ajax(URL.API_ACTIVAR_RUTAS, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: id_ruta,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Ruta Activa Exitosamente'
                        });
                        listar_rutas("");
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

        if (e.target.matches('.form-delete')) {
            let padre = e.target.parentElement.parentElement;
            let id_ruta = padre.querySelector(".id_ruta").value;
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
                    let data = await ajax(URL.API_ELIMIAR_RUTAS, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: id_ruta,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Ruta Eliminada Exitosamente'
                        });
                        listar_rutas("");
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

export async function listar_dias_rutas(buscar) {
    let data = await ajax(URL.API_LISTAR_DIAS_RUTAS, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let estado = "";
    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-rutas");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre_ruta,
            dia,
            dia_id,
            estado_dia,
            nombre
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-dia").textContent = dia;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-ruta").textContent = nombre_ruta;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_ruta").value = id;

        if (estado_ruta == 1) {
            estado = '<span class="badge text-success">Activo</span>';
            document.getElementById("movimiento")
                .content.querySelector("#form-active").style.display = 'none';
            document.getElementById("movimiento")
                .content.querySelector("#form-bloq").style.display = 'block';
        } else {
            estado = '<span class="badge text-danger">Inactivo</span>';
            document.getElementById("movimiento")
                .content.querySelector("#form-active").style.display = 'block';
            document.getElementById("movimiento")
                .content.querySelector("#form-bloq").style.display = 'none';
        }
        document
            .getElementById("movimiento")
            .content.querySelector(".estado").innerHTML = estado;
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}

// Funciones para gestionar Vendedores para RutasController
export async function listar_vendedores() {
    let VENDEDOR = d.getElementById("vendedor");
    let data = await ajax(URL.API_LISTAR_VENDEDOR_RUTAS, {
        method: "POST",
    });
    data.forEach((value) => {
        let { id_vendedor, nombre, apellido } = value;
        let opt = document.createElement('option');
        opt.value = id_vendedor;
        opt.textContent = nombre + "-" + apellido;
        VENDEDOR.appendChild(opt);
    });
}