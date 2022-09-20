import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";

const d = document;
const w = window;
d.addEventListener("DOMContentLoaded", async (e) => {

    let totalClients = await ajax(URL.API_CANTIDAD_CLIENTES, {
        method: "POST",
    });

    if (totalClients) {
        d.getElementById("total-clientes").innerHTML = totalClients
    }


});