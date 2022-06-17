//import { mostrar, ocultar, data_table } from "../helpers/helper.js";
import { listar_clientes } from "./funciones.js";

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
              <img src="../public/img/loading.png" alt="Cargando..." width="30px" height="30px">
              Esperando Respuesta...
                      `;
            d.getElementById("lista-general-clientes").innerHTML = template;
        } else {
            listar_clientes("");
        }
    })
    /* d.getElementById("buscar").on('keyup', function () {
        if ($("#buscar").val() != "") {
            listar_clientes($("#buscar").val());
            let template = "";
            template += `
              <img src="public/img/loading.png" alt="Cargando..." width="30px" height="30px">
              Esperando Respuesta...
                      `;
            $("#listageneralclientes").html(template);
        } else {
            listar_clientes("");
        }
    }); */
    /* mostrar();
    //Creamos la instancia
    const urlParams = new URLSearchParams(pathname);
    //Accedemos a los valores
    var id = urlParams.get('id');
    if (pathname == '/app-movil/detalle-cliente?id=', { id }) {
        detalle_clientes(id);
    } */
});