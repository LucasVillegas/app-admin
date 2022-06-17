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
        <div class="row">
            <div class="col-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 my-2">
                <span><b><i class="fas fa-user"></i></b>  ${c.nombre_cliente}</span>
                <br>
                <span><b><i class="fas fa-store"></i></b> ${c.nombre_tienda}</span>
                <br>
                <span><b><i class="fas fa-route"></i></b> ${c.direccion_cliente}</span>
             </div>
            <div class="col-2" style="display: flex; align-items: center;">
                <a href="detalle-cliente?id=${c.cliente_id}"><i class="fas fa-chevron-right"></i></a>
             </div>
             
        </div>
        <hr class="my-1">
         `;
        $("#listageneralclientes").html(templatedetalle);
    });
}