//import { alert } from "../helpers/helper.js";
import { listar_clientes, cargar_rutas, codigo_cliente, requests } from "./funciones.js";

const d = document;
const w = window;
const btn_edit_cliente = d.querySelector('btn-edit');
d.addEventListener("DOMContentLoaded", async (e) => {
    btn_edit_cliente.addEventListener("click", async (e) => {
        e.preventDefault();

        if (e.target.matches('#btn-edit') || e.target.matches('#btn-edit *')) {
            myModal.show();
            let padre = e.target.parentElement.parentElement;
            let id_cliente = padre.querySelector(".id_cliente").value;
            console.log(id_cliente);
            if (id_cliente != 0) {
                let data = await ajax(URL.API_PREPARAR_CLIENTE, {
                    method: "POST",
                    //body: new FormData(e.target),
                    body: appendForm({
                        form: d.createElement("form"),
                        dato: id_cliente,
                    }),
                });
                data.forEach((value) => {
                    let { codigo_cliente, ruta_id, nit, nombre_cliente, nombre_tienda, direccion_cliente, telefono_cliente, cliente_id, estado_cliente } = value;
                    let codigo = codigo_cliente.replace(/['"]+/g, '');
                    if (!data.length) {
                        d.getElementById("codigo").value = "000";
                        d.getElementById('id').value = "0";
                        d.getElementById('ruta').value = "#";
                        d.getElementById('identificacion').value = "12345678";
                        d.getElementById('nombre_cliente').value = "nombre_cliente";
                        d.getElementById('nombre_tienda').value = "nombre_tienda";
                        d.getElementById('direccion').value = "direccion_cliente";
                        d.getElementById('telefono').value = "telefono_cliente";
                    } else {

                        if (estado_cliente == 1) {
                            d.getElementById('btn-activ').style.display = 'none';
                            d.getElementById('btn-bloq').style.display = 'block';
                        } else {
                            d.getElementById('btn-activ').style.display = 'block';
                            d.getElementById('btn-bloq').style.display = 'none';
                        }

                        d.getElementById('id').value = cliente_id;
                        d.getElementById('ruta').value = ruta_id;
                        d.getElementById('codigo').value = codigo;
                        d.getElementById('identificacion').value = nit;
                        d.getElementById('nombre_cliente').value = nombre_cliente;
                        d.getElementById('nombre_tienda').value = nombre_tienda;
                        d.getElementById('direccion').value = direccion_cliente;
                        d.getElementById('telefono').value = telefono_cliente;
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error de Operación'
                });
            }
        }

    });
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
    codigo_cliente();
    requests();
});