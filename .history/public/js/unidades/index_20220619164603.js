//import { alert } from "../helpers/helper.js";
import { listar_categoria, requests } from "./funciones.js";

const d = document;
const w = window;
d.addEventListener("DOMContentLoaded", async (e) => {
    listar_categoria("");
    d.getElementById("buscar").addEventListener("keyup", async (e) => {
        if (d.getElementById("buscar").value != "") {
            listar_categoria(d.getElementById("buscar").value);
            let template = "";
            template += `
                <div class="col-12 d-flex justify-content-center my-3">
                    <img src="../public/img/loading.png" alt="Cargando..." width="30px" height="30px">
                    Esperando Respuesta...
                </div>
            `;
            d.getElementById("lista-general-categorias").innerHTML = template;
        } else {
            listar_categoria("");
        }
    });
    requests();
});