import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;

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
    data.data.forEach((value) => {
        let { id, nombre_ruta } = value;
        let opt = document.createElement('option');
        opt.value = id;
        opt.textContent = nombre_ruta;
        RUTAS.appendChild(opt);
    });
}