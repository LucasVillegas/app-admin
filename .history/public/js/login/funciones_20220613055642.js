import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;



export function requests() {
    d.addEventListener("click", async (e) => {
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
    var yourUsername = d.getElementById("yourUsername").value;
    if (yourUsername != "" && yourUsername.length > 4) {
        //d.getElementById("yourUsername").removeClass("is-invalid");
        cont++;
    } else {
        // d.getElementById("yourUsername").addClass("is-invalid");

        d.getElementById("alertas-usuario").style.display = "block";
        /* Swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "El usuario es Obligatorio!",
            showConfirmButton: false,
            timer: 1500,
        }); */
    }

    var yourPassword = d.getElementById("yourPassword").value;
    if (yourPassword != "" && yourPassword.length > 4) {
        //d.getElementById("#yourPassword").removeClass("is-invalid");
        cont++;
    } else {
        d.getElementById("alertas-clave").style.display = "block";
        // d.getElementById("#yourPassword").addClass("is-invalid");
        /* Swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "La clave y el usuario es Obligatorio!",
            showConfirmButton: false,
            timer: 1500,
        }); */
    }

    if (cont == 2) {
        return true;
    } else {
        return false;
    }
}