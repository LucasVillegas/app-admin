import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;

export function requests() {
    d.addEventListener("click", async (e) => {
        e.preventDefault();
        if (e.target.matches('.btn-edit') || e.target.matches('.btn-edit *')) {
            let padre = e.target.parentElement.parentElement;
            /* idv = padre.querySelector('.venta_id').value;
            console.log(idv);
             $.post(URL.API_DETALLE_VENTAS, idv, function (response) {
                let venta = JSON.parse(response);
                let templatedetalle = "";
                let templateventa = "";


                venta.detalle.forEach(v => {
                    console.log(v.nombre);
                    templatedetalle += `
                    <h6 class="nombre-codigo">${v.nombre}</h6>
                    <h6 class="precio text-dark" style="margin-top:-10px;">${v.precio_venta}</h6>
                    <h6 class="cantidad text-center" style="margin-top:-20px;">${v.cantidad_venta}</h6>
                    <h5 class="total-producto text-right" style="margin-top:-25px;">${v.total_venta}</h5>
                    <h6 class="obs"></h6>
                     `;
                });

                venta.venta.forEach(c => {
                    $('#obs').html(c.observaciones);
                    templateventa += `
                    <h5 class="estado"><span class="badge ${c.estado_venta == 1 ? "text-warning" : "text-success"}">${c.estado_venta == 1 ? "Pendiente" : "Realizada"}</span></h5>
                    <h6 class="factura text-dark">${c.id}</h6>
                    <h6 class="fecha text-dark" style="margin-top:-10px;">${c.fecha_entrega}</h6>
                    <h6 class="cliente" style="margin-top:-10px;">${c.nombre_cliente}/Tienda</h6>
                    <h5 class="total">${c.Total}</h5>
                     `;
                });

                $('#venta').html(templateventa);
                $('#detalle').html(templatedetalle);
            }); */
        }
    });
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
        <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
            <div class="card" style="height: 45px;border-radius:5px;margin-top:-25px">
                <div class="card-body p-2">
                    <div class="row ">
                        <div class="col-7">
                            <span class="text-dark">${c.nombre_cliente.toLowerCase()}</span>
                        </div>
                        <div class="col-5">
                            <span class="text-dark"> ${c.telefono_cliente}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
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