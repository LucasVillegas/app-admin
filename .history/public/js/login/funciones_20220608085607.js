import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;



export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();
        //debugger;
        if (e.target.matches("#frmconsolidadotrabajador")) {
            let CODVEND = document.getElementById("trabajadores").value;
            if (CODVEND != "") {
                let data = await ajax(URL.API_CONSOLIDADO_VENDEDORES, {
                    method: "POST",
                    body: appendForm({
                        form: e.target,
                        trabajador: CODVEND,
                    }),
                });
                llenartabla(data);
            } else {
                Swal.fire({
                    //title: "Oops...",
                    text: "Seleccionar Deposito para ver el Movimiento Contable",
                    icon: "warning",
                    customClass: {
                        confirmButton: "btn btn-success btn-modal",
                        //cancelButton: "btn btn-danger btn-modal",
                    },
                    buttonsStyling: false,
                });
                let tbody = document
                    .getElementById("tbl_consolidado_vendedor")
                    .querySelector("tbody");
                tbody.innerHTML = "";
            }
        }

        if (e.target.matches("#frmconsolidado")) {
            Visualizar_consolidado_VendedorPDF();
        }

        if (e.target.matches("#frmguardarconsolidado")) {
            Guardar_consolidado_VendedorPDF();
        }

        if (e.target.matches("#frmconsolidadogeneral")) {
            Visualizar_consolidadoPDF();
        }

        if (e.target.matches("#frmdescargarconsolidadogeneral")) {
            consolidadoPDF();
        }

    });
}