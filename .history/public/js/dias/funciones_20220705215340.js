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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Dias-Rutas'));
export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('#form-save')) {
            if (d.getElementById('id').value == "") {
                let data = await ajax(URL.API_AGREGAR_DIA_RUTA, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        dia: d.getElementById('dia').value,
                        ruta: d.getElementById('ruta').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Dia Registrado Exitosamente'
                    });
                    listar_dias_rutas("");
                    d.getElementById('buscar').value = '';
                    myModal.hide();
                } else if (data == 2) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'El Dia ya se encuentra registrado en el sitema.'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Dia no Agregado'
                    });
                }
            } else {
                let data = await ajax(URL.API_ACTUALIZAR_DIA_RUTA, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id').value,
                        dia: d.getElementById('dia').value,
                        ruta: d.getElementById('ruta').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Dia Actualizado Exitosamente'
                    });
                    listar_dias_rutas("");
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
            let id_dias_ruta = padre.querySelector(".id_dias_ruta").value;
            console.log(id_dias_ruta);
            if (id_dias_ruta != 0) {
                let data = await ajax(URL.API_PREPARA_DIA_RUTA, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_dias_ruta,
                    }),
                });
                data.forEach((value) => {
                    let { dia_id, dia, ruta_id } = value;
                    if (!data.length) {
                        d.getElementById('id').value = "id";
                        d.getElementById("dia").value = "dia";
                        d.getElementById("ruta").value = "ruta";
                    } else {
                        d.getElementById('id').value = dia_id;
                        d.getElementById("dia").value = dia;
                        d.getElementById("ruta").value = ruta_id;
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
            d.getElementById('dia').value = '';
            d.getElementById('ruta').value = 'Seleccionar Vendedor';
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
            let id_dias_ruta = padre.querySelector(".id_dias_ruta").value;
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
                    let data = await ajax(URL.API_ELIMINAR_DIA_RUTA, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: id_dias_ruta,
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
    let tbody = document.getElementById("lista-general-dias-rutas");
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
            .content.querySelector(".nombre-ruta").textContent = nombre_ruta + " / " + nombre;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_dias_ruta").value = dia_id;

        if (estado_dia == 1) {
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
export async function listar_rutas() {
    let VENDEDOR = d.getElementById("ruta");
    let data = await ajax(URL.API_LISTAR_RUTAS, {
        method: "POST",
    });
    data.forEach((value) => {
        let { id, nombre_ruta, nombre } = value;
        let opt = document.createElement('option');
        opt.value = id;
        opt.textContent = nombre_ruta + "-" + nombre;
        VENDEDOR.appendChild(opt);
    });
}