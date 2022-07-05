import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
const myModal = new bootstrap.Modal(document.getElementById('Modal-Edit-Unidades'));

export async function listar_unidad(buscar) {
    let data = await ajax(URL.API_LISTAR_UNIDAD, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            dato: buscar,
        }),
    });
    let estado = "";
    let fragment = document.createDocumentFragment();
    let tbody = document.getElementById("lista-general-unidades");
    tbody.innerHTML = "";
    data.forEach((value) => {
        let {
            nombre_unidad,
            descripcion_unidad,
            id,
            estado_unidad
        } = value;
        document
            .getElementById("movimiento")
            .content.querySelector(".nombre-unidad").textContent = nombre_unidad;
        document
            .getElementById("movimiento")
            .content.querySelector(".descripcion-unidad").textContent = descripcion_unidad.toLowerCase();
        document
            .getElementById("movimiento")
            .content.querySelector(".id_unidad").value = id;

        if (estado_unidad == 1) {
            estado = '<span class="badge text-success">Activo</span>';
            document.getElementById("movimiento")
                .content.querySelector("#form-active").style.display = 'none';
            document.getElementById("movimiento")
                .content.querySelector("#form-bloq").style.display = 'block';
        } else {
            estado = '<span class="badge text-danger">Inactivo</span>';
            document.getElementById("movimiento")
                .content.querySelector("#form-active").style.display = 'block';
            document.getElementById("movimiento")
                .content.querySelector("#form-bloq").style.display = 'none';
        }
        document
            .getElementById("movimiento")
            .content.querySelector(".estado").innerHTML = estado;
        let clone = document.importNode(
            document.getElementById("movimiento").content,
            true
        );
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
}