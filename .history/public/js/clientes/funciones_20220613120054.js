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
        <div class="card" style="height: 50px;border-radius:5px;margin-top:-25px">
            <div class="card-body p-2">
                <div class="row ml-5">
                    <div class="col-1 d-flex justify-content-center">
                        <button type="button" class="btn text-warning btn-sm"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                    <div class="col-6">
                        <div class="nom-cliente">${c.nombre_cliente.toLowerCase()}</div>
                    </div>
                    <div class="col-5">
                        <span> ${c.telefono_cliente}</span>
                    </div>
                </div>
            </div>
        </div>
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
    });
}