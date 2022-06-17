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
    let templatedetalle = "";
    data.forEach((c) => {
        templatedetalle += `
        <div class="col-2">
                        <button type="button" class="btn text-warning btn-sm"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                    <div class="col-5">
                        <span><b><i class="fas fa-user"></i></b> ${c.nombre_cliente}</span>
                    </div>
                    <div class="col-5">
                        <span><b><i class="fas fa-store"></i></b> ${c.tefelefono_cliente}</span>
                    </div>
        <hr class="my-1">
         `;
        d.getElementById("lista-general-clientes")
        $("#lista-general-clientes").html(templatedetalle);
    });
}