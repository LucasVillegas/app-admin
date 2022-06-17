//import { getFecha, mostrar, ocultar } from "../helpers/helper.js";
import { cargar_rutas, codigo_cliente, requests, limpiar_campos, listar_clientes, remover_clase } from "./funciones.js";

const d = document;
const w = window;

d.addEventListener("DOMContentLoaded", async (e) => {
    $(".select2").select2();
    cargar_rutas();
    mostrar();
    ocultar();
    codigo_cliente();
    requests();
    limpiar_campos();
    listar_clientes();
    remover_clase();
});