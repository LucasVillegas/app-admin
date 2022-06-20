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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Categoria'));

export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('#form-save')) {
            if (d.getElementById('id').value == "") {
                let data = await ajax(URL.API_AGREGAR_CATEGORIA, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        categoria: d.getElementById('categoria').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Categoria Registrado Exitosamente'
                    });
                    listar_categoria("");
                    d.getElementById('buscar').value = '';
                    myModal.hide();
                } else if (data == 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'La categoria ya se encuentra registrada en el sitema.'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Categoria no Agregada'
                    });
                }
            } else {
                let data = await ajax(URL.API_ACTUALIZAR_CATEGORIA, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id').value,
                        categoria: d.getElementById('categoria').value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Categoria Actualizada Exitosamente'
                    });
                    listar_categoria("");
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
            let id_categorias = padre.querySelector(".id_categorias").value;
            console.log(id_categorias);
            if (id_categorias != 0) {
                let data = await ajax(URL.API_PREPARAR_CATEGORIA, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_categorias,
                    }),
                });
                data.forEach((value) => {
                    let { id, nombre_categoria, estado_categoria } = value;
                    if (!data.length) {
                        d.getElementById("identificacion").value = "000";
                    } else {
                        if (estado_categoria == 1) {
                            /*  d.getElementById('btn-activ').style.display = 'none';
                             d.getElementById('btn-bloq').style.display = 'block'; */
                            d.getElementById('btn-delete').style.display = 'block';
                        } else {
                            /* d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none'; */
                            d.getElementById('btn-delete').style.display = 'block';
                        }
                        d.getElementById('id').value = id;
                        d.getElementById("categoria").value = nombre_categoria;
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
            d.getElementById('categoria').value = '';
        }

        /*         if (e.target.matches('#form-bloq')) {
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
                            let data = await ajax(URL.API_BLOQUEAR_VENDEDOR, {
                                method: "POST",
                                body: appendForm({
                                    form: d.createElement("form"),
                                    id: d.getElementById('id').value,
                                }),
                            });
                            if (data == 1) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Vendedor Bloqueada Exitosamente'
                                });
                                listar_vendedores("");
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
                } */

        /*         if (e.target.matches('#form-activ')) {
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
                            let data = await ajax(URL.API_ACTIVAR_VENDEDOR, {
                                method: "POST",
                                body: appendForm({
                                    form: d.createElement("form"),
                                    id: d.getElementById('id').value,
                                }),
                            });
                            if (data == 1) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Vendedor Activo Exitosamente'
                                });
                                listar_vendedores("");
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
                } */

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
                    let data = await ajax(URL.API_ELIMINAR_CATEGORIA, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Categoria Eliminado Exitosamente'
                        });
                        listar_vendedores("");
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


export async function listar_categoria(buscar) {
    let data = await ajax(URL.API_LISTAR_CATEGORIA, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });

    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-categorias");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre_categoria,
            id,
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-categoria").textContent = nombre_categoria;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_categorias").value = id;
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}