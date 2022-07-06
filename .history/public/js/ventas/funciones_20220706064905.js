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
            let padre = e.target.parentElement.parentElement;
            let id_venta = padre.querySelector(".id_venta").value;
            console.log(id_venta);
            if (id_venta != 0) {
                let data = await ajax(URL.API_DETALLE_VENTAS, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: id_venta,
                    }),
                });
                let templatedetalle = "";
                let codigo = "";
                data.detalle.forEach(v => {
                    codigo = v.codigo_producto.replace(/['"]+/g, '');
                    //console.log(v.nombre);
                    templatedetalle += `
                            <h6 class="nombre-codigo"  style="font-size:12px;">${v.nombre} - ${codigo}</h6>
                            <h6 class="precio text-dark" style="font-size:12px;margin-top:-10px;">$ ${formatNum(v.precio_venta)}/${v.descripcion_unidad}</h6>
                            <h6 class="cantidad text-center" style="font-size:12px;margin-top:-20px;">X${v.cantidad_venta}</h6>
                            <h6 class="total-producto text-end" style="font-size:12px;margin-top:-20px;">$ ${formatNum(v.precio_venta * v.cantidad_venta)}</h6>
                            <hr class="my-1">
                            `;
                });
                d.getElementById('detalle').innerHTML = templatedetalle;
                // Cabeera
                let data1 = await ajax(URL.API_DETALLE_VENTAS_CABECERAS, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        id: id_venta,
                    }),
                });

                let templateventa = "";
                data1.venta.forEach(c => {
                    d.getElementById('obs').innerHTML = c.observaciones;
                    d.getElementById('subtotal').innerHTML = "$ " + formatNum(c.total_venta);
                    d.getElementById('iva').innerHTML = 0;
                    d.getElementById('total').innerHTML = "$ " + formatNum(c.total_venta);
                    templateventa += `
                        <h5  style="font-weight:bold;" class="estado text-center"><span class="badge ${c.estado_venta == 1 ? "text-danger" : "text-success"}">${c.estado_venta == 1 ? "<i class='bi bi-file-arrow-down'></i> Pendiente de facturación" : "<i class='bi bi-file-check'></i> Facutación aprobada"
                        }</span ></h5 >
                        <h6 style="font-size:12px;" class="factura text-dark">Factura ID ${c.id}</h6>
                        <h6 style="font-size:12px;margin-top:-10px;" class="fecha text-dark">${c.fecha_entrega}</h6>
                        <h6 style="font-size:12px;margin-top:-10px;" class="cliente">${c.nombre_cliente} / ${c.nombre_tienda}</h6>
                        <h6 class="total" style="font-weight:bold;">$ ${formatNum(c.total_venta)}</h6>
                        `;
                });
                d.getElementById('venta').innerHTML = templateventa;
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