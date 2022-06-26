//import { alert } from "../helpers/helper.js";
import { listar_productos, cargar_unidades, requests } from "./funciones.js";

const d = document;
const w = window;
d.addEventListener("DOMContentLoaded", async (e) => {
    listar_productos("");
    d.getElementById("buscar").addEventListener("keyup", async (e) => {
        if (d.getElementById("buscar").value != "") {
            listar_productos(d.getElementById("buscar").value);
            let template = "";
            template += `
                        <div class="col-12 d-flex justify-content-center my-3">
                            <img src="../public/img/loading.png" alt="Cargando..." width="30px" height="30px">
                            Esperando Respuesta...
                        </div>
                    `;
            d.getElementById("lista-general-categorias").innerHTML = template;
        } else {
            listar_productos("");
        }
    });
    requests();
    cargar_unidades();
});