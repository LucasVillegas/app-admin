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
            <div class="col-1 d-flex justify-content-center">
                <button type="button" class="btn text-warning btn-sm"><i class="bi bi-pencil-fill"></i></button>
            </div>
            <div class="nom-cliente">
            <div class="col-6">
            <span>${c.nombre_cliente.toLowerCase()}</span>
        </div>
            </div>
            
            
            <div class="col-5">
               <span> ${c.telefono_cliente}</span>
            </div>
            <hr class="my-1">
         `;
        d.getElementById("lista-general-clientes").innerHTML = template_lista_clinetes;
        //$("#lista-general-clientes").html(templatedetalle);
    });
}