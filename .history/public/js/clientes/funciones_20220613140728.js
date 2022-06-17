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
        <a href="#">
            <div class="card" style="height: 55px;border-radius:5px;margin-top:-25px">
                <div class="card-body p-3">
                    <div class="row ">
                        <div class="col-7">
                            <div class="nom-cliente">${c.nombre_cliente.toLowerCase()}</div>
                        </div>
                        <div class="col-5">
                            <span> ${c.telefono_cliente}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
    });
}