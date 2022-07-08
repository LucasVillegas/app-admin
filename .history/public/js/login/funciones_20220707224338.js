import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;

export function requests() {
    d.addEventListener("click", async (e) => {
        e.preventDefault();
        //debugger;
        if (e.target.matches('.btn-login') || e.target.matches('.btn-login *')) {
            if (validar()) {
                /* const datos = {
                    usuario: d.getElementById("usuario").value,
                    clave: d.getElementById("clave").value,
                }; */

                let data = await ajax(URL.API_INICIAR_SESION, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        usuario: d.getElementById("usuario").value,
                        clave: d.getElementById("clave").value,
                    }),
                });
                if (data == 1) {
                    window.location = "home";
                }
                if (data != 1 && data == 2) {
                    window.location = "oficina";
                }
                if (data != 2 && data == 3) {
                    window.location = "venta";
                }
                if (data != 1 && data == 0) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Oops...",
                        text: "Error su usuario o contraseña incorrecta o su usuario esta deshabilitado!",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    $("#error").show();
                    $("#usuario").val("");
                    $("#clave").val("");
                }
            }
        }

    });
}

export function validar() {
    var cont = 0;
    var yourUsername = d.getElementById("yourUsername").value;
    if (yourUsername != "" && yourUsername.length > 4) {
        //d.getElementById("yourUsername").removeClass("is-invalid");
        cont++;
    } else {
        // d.getElementById("yourUsername").addClass("is-invalid");

        d.getElementById("alertas-usuario").style.display = "block";
        setTimeout(function () {
            // d.getElementById("alertas-usuario").fadeOut(1500);
            d.getElementById("alertas-usuario").style.display = "none";
        }, 1500);
    }

    var yourPassword = d.getElementById("yourPassword").value;
    if (yourPassword != "" && yourPassword.length > 4) {
        //d.getElementById("#yourPassword").removeClass("is-invalid");
        cont++;
    } else {
        d.getElementById("alertas-clave").style.display = "block";
        setTimeout(function () {
            // d.getElementById("alertas-usuario").fadeOut(1500);
            d.getElementById("alertas-clave").style.display = "none";
        }, 1500);
        // d.getElementById("#yourPassword").addClass("is-invalid");
    }

    if (cont == 2) {
        return true;
    } else {
        return false;
    }
}