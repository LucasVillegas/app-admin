//import { mostrar, ocultar, data_table } from "../helpers/helper.js";
import { listar_clientes, cargar_rutas } from "./funciones.js";

const d = document;
const w = window;
d.addEventListener("DOMContentLoaded", async (e) => {
    /*     conut();
        requests();
        const pathname = window.location.search;
    
        listar_ruta();
        generar_codigo(); */


    listar_clientes("");

    d.getElementById("buscar").addEventListener("keyup", async (e) => {
        if (d.getElementById("buscar").value != "") {
            listar_clientes(d.getElementById("buscar").value);
            let template = "";
            template += `
                <div class="col-12 d-flex justify-content-center my-3">
                    <img src="../public/img/loading.png" alt="Cargando..." width="30px" height="30px">
                    Esperando Respuesta...
                </div>
            `;
            d.getElementById("lista-general-clientes").innerHTML = template;
        } else {
            listar_clientes("");
        }
    });
    cargar_rutas();
});