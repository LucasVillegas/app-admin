import URL from "./url.js";
const d = document;
export async function ajax(url, options = null) {
    try {
        let res = await fetch(url, options);
        if (!res.ok) throw { status: res.status, statusText: res.statusText };
        let data = await res.json();
        return data;
    } catch (err) {
        console.log(err);
        //return error(err);
    }
}

export function appendForm(values) {
    let formdata = new FormData(values.form);
    for (const key in values) {
        formdata.append(key, values[key]);
    }
    return formdata;
}

export function checkUserBD(user) {
    const data = ajax(URL.API_USERS, {
        method: "POST",
        body: appendForm({
            form: d.createElement("form"),
            username: user.PERFIL,
            password: atob(user.CLAVE),
            nomusu: user.NOMUSU,
            nitcli: user.NITCLI,
            grupus: user.GRUPUS,
            mode: "validate",
        }),
    });
    return data;
}

//Función para formatear números miles
export function formatNum(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

export const getFecha = (format) => {
    let date = new Date(),
        year = date.getFullYear(),
        month = date.getMonth() + 1,
        day = date.getDate().toString().padStart(2, "0"),
        hours = date.getHours().toString().padStart(2, "0"),
        minutes = date.getMinutes().toString().padStart(2, "0"),
        seconds = date.getSeconds().toString().padStart(2, "0"),
        formatDate = "";
    month = month.toString().padStart(2, "0");

    switch (format.toLowerCase()) {
        case "dd/mm/yyyy":
            formatDate = `${day}/${month}/${year}`;
            break;
        case "yymmdd":
            year = year.toString().substring(2);
            formatDate = `${year}${month}${day}`;
            break;
        case "yyyy-mm-dd":
            formatDate = `${year}-${month}-${day}`;
            break;
        case "yyyy-mm-dd-hh:mm:ss":
            formatDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            break;
        case "hhmm":
            formatDate = `${hours}${minutes}`;
            break;
    }
    return formatDate;
};

export const formatFecha = (date, format) => {
    let { year, month, day } = date;
    let formatDate = null;
    switch (format.toLowerCase()) {
        case "dd/mm/yyyy":
            formatDate = `${day}/${month}/${year}`;
            break;
        case "yyyy/mm/dd":
            formatDate = `${year}/${month}/${day}`;
            break;
        case "yymmdd":
            formatDate = `${day}${month}${year.toString().substring(2, 4)}`;
            break;
    }
    return formatDate;
};

/* ALERTA 
export function alert(options) {
    let { icon, title, text, callback } = options;
    Swal.fire({
        title,
        text,
        icon,
        customClass: {
            confirmButton: "btn btn-success btn-modal",
            cancelButton: "btn btn-danger btn-modal",
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed && callback) callback();
    });
}*/

export function alert() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}


//Mostrar Formularo de registro
export function mostrar() {
    d.addEventListener("click", async (e) => {
        if (e.target.matches("#btnadd")) {
            document.getElementById('formadd').style.display = 'block';
            document.getElementById('tbllist').style.display = 'none';
        }
    });
}

//Ocultar Formularo de registro
export function ocultar() {
    d.addEventListener("click", async (e) => {
        if (e.target.matches("#btnhide")) {
            document.getElementById('formadd').style.display = 'none';
            document.getElementById('tbllist').style.display = 'block';
            document.getElementById('formupdate').style.display = 'none';
            document.getElementById('formupdateuser').style.display = 'none';
        }
    });
}