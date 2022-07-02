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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Unidades'));

export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('#form-save')) {
            if (d.getElementById('id').value == "") {
                let data = await ajax(URL.API_AGREGAR_UNIDAD, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        unidad: d.getElementById('unidad').value,
                        descripcion_unidad: d.getElementById('descripcion_unidad').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Unidad Registrada Exitosamente'
                    });
                    listar_unidad("");
                    d.getElementById('buscar').value = '';
                    myModal.hide();
                } else if (data == 2) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'La Unidad ya se encuentra registrada en el sitema.'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Unidad no Agregada'
                    });
                }
            } else {
                let data = await ajax(URL.API_ACTUALIZAR_UNIDAD, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id').value,
                        unidad: d.getElementById('unidad').value,
                        descripcion_unidad: d.getElementById('descripcion_unidad').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Unidad Actualizada Exitosamente'
                    });
                    listar_unidad("");
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
            let id_unidad = padre.querySelector(".id_unidad").value;
            console.log(id_unidad);
            if (id_unidad != 0) {
                let data = await ajax(URL.API_PREPARAR_UNIDAD, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_unidad,
                    }),
                });
                data.forEach((value) => {
                    let { id, nombre_unidad, descripcion_unidad, estado_unidad } = value;
                    if (!data.length) {
                        d.getElementById("identificacion").value = "000";
                        d.getElementById("unidad").value = "nombre_unidad";
                        d.getElementById("descripcion_unidad").value = "descripcion_unidad";
                    } else {
                        if (estado_unidad == 1) {
                            d.getElementById('btn-activ').style.display = 'none';
                            d.getElementById('btn-bloq').style.display = 'block';
                            d.getElementById('btn-delete').style.display = 'block';
                        } else {
                            d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none';
                            d.getElementById('btn-delete').style.display = 'block';
                        }
                        d.getElementById('id').value = id;
                        d.getElementById("unidad").value = nombre_unidad;
                        d.getElementById("descripcion_unidad").value = descripcion_unidad;
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
            d.getElementById('btn-bloq').style.display = 'none';
            d.getElementById('btn-delete').style.display = 'none';
            d.getElementById('id').value = '';
            d.getElementById('unidad').value = '';
            d.getElementById('descripcion_unidad').value = '';
        }

        if (e.target.matches('#form-bloq')) {
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
                    let data = await ajax(URL.API_BLOQUEAR_UNIDAD, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Unidad Bloqueada Exitosamente'
                        });
                        listar_unidad("");
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

        if (e.target.matches('#form-activ')) {
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
                    let data = await ajax(URL.API_ACTIVAR_UNIDAD, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Unidad Activa Exitosamente'
                        });
                        listar_unidad("");
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

        if (e.target.matches('#form-delete')) {
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
                    let data = await ajax(URL.API_ELIMINAR_UNIDAD, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Unidad Eliminada Exitosamente'
                        });
                        listar_unidad("");
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


export async function listar_unidad(buscar) {
    let data = await ajax(URL.API_LISTAR_UNIDAD, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let estado = "";
    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-unidades");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre_unidad,
            descripcion_unidad,
            id,
            estado_unidad
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-unidad").textContent = nombre_unidad;
        document
            .getElementById("movimiento")
            .content.querySelector(".descripcion-unidad").textContent = descripcion_unidad.toLowerCase();
        document
            .getElementById("movimiento")
            .content.querySelector(".id_unidad").value = id;

        if (estado_unidad == 1) {
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
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}