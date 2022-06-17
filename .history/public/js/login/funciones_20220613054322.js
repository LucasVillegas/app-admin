import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;



export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();
        //debugger;
        if (e.target.matches('.btn-login') || e.target.matches('.btn-login *')) {
            if (validar()) {
                const datos = {
                    usuario: $("#usuario").val(),
                    clave: $("#clave").val(),
                };
                $.post(
                    "app/Controllers/LoginController.php?op=iniciar_secion",
                    datos,
                    function (response) {
                        if (response == 1) {
                            window.location = "home";
                        }
                        if (response != 1 && response == 2) {
                            window.location = "oficina";
                        }
                        /*if (response != 2 && response == 3) {
                            window.location = "venta";
                        } */
                        if (response != 1 && response == 0) {
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
                );
            }
        }

    });
}

export function validar() {
    var cont = 0;
    var yourUsername = $("#yourUsername").val();
    if (yourUsername != "" && yourUsername.length > 4) {
        $("#yourUsername").removeClass("is-invalid");
        cont++;
    } else {
        $("#yourUsername").addClass("is-invalid");
        /* Swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "El usuario es Obligatorio!",
            showConfirmButton: false,
            timer: 1500,
        }); */
    }

    var yourPassword = $("#yourPassword").val();
    if (yourPassword != "" && yourPassword.length > 4) {
        $("#yourPassword").removeClass("is-invalid");
        cont++;
    } else {
        $("#yourPassword").addClass("is-invalid");
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "La clave y el usuario es Obligatorio!",
            showConfirmButton: false,
            timer: 1500,
        });
    }

    if (cont == 2) {
        return true;
    } else {
        return false;
    }
}