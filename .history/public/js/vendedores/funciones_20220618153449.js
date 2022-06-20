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

        //Formulario apra editar datos personales
        if (e.target.matches('#form-edit')) {
            d.getElementById('datos-usuario').style.display = "none";
            d.getElementById('datos-personales').style.display = "block";
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
                        d.getElementById('id_vendedor_user').value = '';
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

        //Formulario para Editar el Usuario 
        if (e.target.matches('#form-edit-user')) {
            d.getElementById('datos-personales').style.display = "none";
            d.getElementById('datos-usuario').style.display = "block";
            myModal.show();
            let padre = e.target.parentElement.parentElement;
            let id_vendedor = padre.querySelector(".id_vendedores").value;
            console.log(id_vendedor);
            if (id_vendedor != 0) {
                let data = await ajax(URL.API_PREPARE_USER_VENDEDOR, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_vendedor,
                    }),
                });
                data.forEach((value) => {
                    let { users_id, usuario, clave, correo, estado_persona } = value;
                    if (!data.length) {
                        d.getElementById("usuario").value = "000";
                        d.getElementById('correo').value = "0";
                        d.getElementById('password').value = "#";
                        d.getElementById('password_confirmation').value = "12345678";
                    } else {

                        if (estado_persona == 1) {
                            d.getElementById('btn-activ').style.display = 'none';
                            d.getElementById('btn-bloq').style.display = 'block';
                        } else {
                            d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none';
                        }
                        d.getElementById('id').value = '';
                        d.getElementById('id_vendedor_user').value = users_id;
                        d.getElementById("usuario").value = usuario;
                        d.getElementById('correo').value = correo;
                        d.getElementById('password').value = clave;
                        d.getElementById('password_confirmation').value = clave;
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
            d.getElementById('datos-personales').style.display = "block";
            d.getElementById('datos-usuario').style.display = "block";
            d.getElementById("acciones").style.display = 'none';
            d.getElementById('id').value = '';
            d.getElementById('identificacion').value = '';
            d.getElementById('nombres').value = '';
            d.getElementById('apellidos').value = '';
            d.getElementById('telefono').value = '';
            d.getElementById('usuario').value = '';
            d.getElementById('correo').value = '';
            d.getElementById('password').value = '';
            d.getElementById('password_confirmation').value = '';
        }

        if (e.target.matches('#form-save')) {
            if (d.getElementById('id_vendedor_user').value == "" && d.getElementById('id').value != "") {

                let data = await ajax(URL.API_ACTUALIZAR_VENDEDOR, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id').value,
                        identificacion: d.getElementById("identificacion").value,
                        nombres: d.getElementById('nombres').value,
                        apellidos: d.getElementById('apellidos').value,
                        telefono: d.getElementById('telefono').value
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cliente Actualizado Exitosamente'
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
            } else if (d.getElementById('id_vendedor_user').value != "" && d.getElementById('id').value == "") {

                let data = await ajax(URL.API_ACTUALIZAR_USER_VENDEDOR, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: d.getElementById('id_vendedor_user').value,
                        usuario: d.getElementById("usuario").value,
                        correo: d.getElementById('correo').value,
                        password: d.getElementById('password').value,
                        password_confirmation: d.getElementById('password_confirmation').value
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cliente Actualizado Exitosamente'
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