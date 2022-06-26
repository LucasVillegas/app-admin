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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Productos'));

export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();
        if (e.target.matches('#form-save')) {
            if (d.getElementById('id').value == "") {
                let data = await ajax(URL.API_AGREGAR_PRODUCTOS, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        codigo: d.getElementById("codigo").value,
                        categoria: d.getElementById("categoria").value,
                        unidad: d.getElementById("unidad").value,
                        descripcion: d.getElementById("descripcion").value,
                        nuevoPrecioCompra: d.getElementById("nuevoPrecioCompra").value,
                        nuevoPrecioPorcentaje: d.getElementById("nuevoPrecioPorcentaje").value,
                        cantidad: d.getElementById("cantidad").value,
                        porcentaje: d.getElementById("porcentaje").value,
                        preciototal: d.getElementById("preciototal").value,
                    }),
                });
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Producto Registrado Exitosamente'
                    });
                    listar_productos("");
                    d.getElementById('buscar').value = '';
                    myModal.hide();
                } else if (data == 2) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'El producto ya se encuentra registrado en el sitema.'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Producto no Agregada'
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

        if (e.target.matches('#form-opne-modal')) {
            myModal.show();
            d.getElementById('id').value = "";
            d.getElementById("codigo").value = codigo_producto();
            d.getElementById("categoria").value = "";
            d.getElementById("unidad").value = "";
            d.getElementById("descripcion").value = "";
            d.getElementById("nuevoPrecioCompra").value = "";
            d.getElementById("nuevoPrecioPorcentaje").value = "";
            d.getElementById("cantidad").value = "";
            d.getElementById("porcentaje").value = "";
            d.getElementById("preciototal").value = "";
        }


        //Formulario apra editar datos personales
        if (e.target.matches('.form-edit')) {
            myModal.show();
            let padre = e.target.parentElement.parentElement;
            let id_producto = padre.querySelector(".id_producto").value;
            console.log(id_producto);
            if (id_producto != 0) {
                let data = await ajax(URL.API_PREPARAR_PRODUCTOS, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_producto,
                    }),
                });
                let codigo = "";
                data.forEach((value) => {
                    let { producto_id,
                        codigo_producto,
                        categoria_id,
                        unidad_id,
                        nombre_producto,
                        precio_compra,
                        precio_porcentaje,
                        cantidad,
                        porcentaje,
                        precio,
                        estado_producto
                    } = value;
                    codigo = codigo_producto.replace(/['"]+/g, '');
                    if (!data.length) {
                        d.getElementById("identificacion").value = "000";
                        d.getElementById("unidad").value = "nombre_unidad";
                        d.getElementById("descripcion_unidad").value = "descripcion_unidad";
                    } else {
                        d.getElementById('id').value = producto_id;
                        d.getElementById("codigo").value = codigo;
                        d.getElementById("categoria").value = categoria_id;
                        d.getElementById("unidad").value = unidad_id;
                        d.getElementById("descripcion").value = nombre_producto;
                        d.getElementById("nuevoPrecioCompra").value = precio_compra;
                        d.getElementById("nuevoPrecioPorcentaje").value = precio_porcentaje;
                        d.getElementById("cantidad").value = cantidad;
                        d.getElementById("porcentaje").value = porcentaje;
                        d.getElementById("preciototal").value = precio;
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
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
                    let data = await ajax(URL.API_BLOQUEAR_PRODUCTOS, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id_edit').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Producto Bloqueada Exitosamente'
                        });
                        listar_productos("");
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
                    let data = await ajax(URL.API_ACTIVAR_PRODUCTOS, {
                        method: "POST",
                        body: appendForm({
                            form: d.createElement("form"),
                            id: d.getElementById('id_active').value,
                        }),
                    });
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Producto Activo Exitosamente'
                        });
                        listar_productos("");
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

        /*   if (e.target.matches('#form-delete')) {
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
          } */

    });
}

export async function listar_productos(buscar) {
    let data = await ajax(URL.API_LISTAR_PRODUCTOS, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let estado = "";
    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-productos");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre_producto,
            producto_id,
            nombre_unidad,
            estado_producto,
            precio
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-producto").textContent = nombre_producto;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-unidad").textContent = nombre_unidad;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_producto").value = producto_id;
        document
            .getElementById("movimiento")
            .content.querySelector("#id_edit").value = producto_id;
        document
            .getElementById("movimiento")
            .content.querySelector("#id_active").value = producto_id;

        if (estado_producto == 1) {
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
        document
            .getElementById("movimiento")
            .content.querySelector(".precio").textContent = "$" + precio;
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}

//Listar Unidades
export async function cargar_unidades() {
    let RUTAS = d.getElementById("unidad");
    let data = await ajax(URL.API_LISTAR_PRODUCTOS_UNIDADES, {
        method: "POST",
    });
    data.forEach((value) => {
        let { id, nombre_unidad } = value;
        let opt = document.createElement('option');
        opt.value = id;
        opt.textContent = nombre_unidad;
        RUTAS.appendChild(opt);
    });
}

//Listar Categorias
export async function cargar_categorias() {
    let RUTAS = d.getElementById("categoria");
    let data = await ajax(URL.API_LISTAR_PRODUCTOS_CATEGORIAS, {
        method: "POST",
    });
    data.forEach((value) => {
        let { id, nombre_categoria } = value;
        let opt = document.createElement('option');
        opt.value = id;
        opt.textContent = nombre_categoria;
        RUTAS.appendChild(opt);
    });
}

export async function codigo_producto() {
    let data = await ajax(URL.API_GENERAR_CODIGO_PRODUCTOS, {
        method: "POST",
    });
    if (data.length) {
        document.getElementById("codigo").value = "000";
    } else {
        document.getElementById("codigo").value = data
    }
}