import { ajax, appendForm, formatNum } from "../helpers/helper.js";
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
const myModal = new bootstrap.Modal(document.getElementById('Modal-Detalle-Venta'));
export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (e.target.matches('.form-open-modal')) {
            myModal.show();
            let total_producto = 0;
            let fragment = document.createDocumentFragment();
            let tbody = document.getElementById("lista-detalle-productos");
            let padre = e.target.parentElement.parentElement;
            let id_venta = padre.querySelector(".id_venta").value;
            console.log(id_venta);
            if (id_venta != 0) {
                let data = await ajax(URL.API_LISTAR_VENTAS_DETALLE, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_venta,
                    }),
                });
                data.forEach((value) => {
                    let { nombre_producto, codigo_producto, nombre_unidad, precio, cantidad } = value;
                    if (!data.length) {
                        d.getElementById('id').value = "id";
                        d.getElementById("nombre-codigo").value = "dia";
                        d.getElementById("ruta").value = "ruta";
                    } else {
                        ///detalle-producto
                        document
                            .getElementById("movimiento")
                            .content.querySelector(".fecha").textContent = fecha_normal;
                        d.getElementById('id').value = dia_id;
                        d.getElementById("nombre-codigo").value = nombre_producto + "- " + codigo_producto;
                        d.getElementById("precio").value = precio + "/" + nombre_unidad;
                        d.getElementById("cantidad").value = "X" + cantidad;
                        total_producto = formatNum(precio * cantidad);
                        d.getElementById("total-producto").value = "$" + total_producto;

                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
        }

        if (e.target.matches('.form-delete')) {
            let padre = e.target.parentElement.parentElement;
            let id_venta = padre.querySelector(".id_venta").value;
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
                            title: 'Dia Eliminado Exitosamente'
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
            });
        }

    });
}

export async function listar_ventas(buscar) {
    let data = await ajax(URL.API_LISTAR_VENTAS, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let estado = "";
    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-ventas");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            fecha_normal,
            id,
            nombre_tienda,
            total_venta,
            estado_venta,
            nombre_cliente
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".fecha").textContent = fecha_normal;
        document
            .getElementById("movimiento")
            .content.querySelector(".factura").textContent = "Factura ID " + id;
        document
            .getElementById("movimiento")
            .content.querySelector(".tienda").textContent = nombre_tienda + " / " + nombre_cliente;
        document
            .getElementById("movimiento")
            .content.querySelector(".total").textContent = "$" + formatNum(total_venta);

        if (estado_venta == 1) {
            estado = '<span class="badge text-danger">Pendiente</span>';
        } else {
            estado = '<span class="badge text-success">Realizada</span>';
        }
        document
            .getElementById("movimiento")
            .content.querySelector(".estado").innerHTML = estado;
        document
            .getElementById("movimiento")
            .content.querySelector(".id_venta").value = id;
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