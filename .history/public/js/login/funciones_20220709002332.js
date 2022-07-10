import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;

export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();
        //debugger;
        if (e.target.matches('#form-login')) {
            let padre = e.target.parentElement.parentElement;
            //let id_dias_ruta = padre.querySelector(".id_dias_ruta").value;
            if (validar()) {
                let data = await ajax(URL.API_INICIAR_SESION, {
                    method: "POST",
                    body: appendForm({
                        form: d.createElement("form"),
                        usuario: padre.querySelector("#username").value,
                        clave: padre.querySelector("#password").value,
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
                    //$("#error").show();
                    padre.querySelector("#usuario").value = "";
                    padre.querySelector("#clave").value = "";
                }
            }
        }
    });
}

export function validar() {
    var cont = 0;
    var yourUsername = d.getElementById("username").value;
    if (yourUsername != "" && yourUsername.length > 4) {
        cont++;
    } else {
        d.getElementById("alertas-usuario").style.display = "block";
        setTimeout(function () {
            d.getElementById("alertas-usuario").style.display = "none";
        }, 1500);
    }

    var yourPassword = d.getElementById("password").value;
    if (yourPassword != "" && yourPassword.length > 4) {
        cont++;
    } else {
        d.getElementById("alertas-clave").style.display = "block";
        setTimeout(function () {
            d.getElementById("alertas-clave").style.display = "none";
        }, 1500);
    }

    if (cont == 2) {
        return true;
    } else {
        return false;
    }
}